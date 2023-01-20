<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Stripe;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $mobile;
    public $email;
    public $country;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $zip_code;
    public $order_notes;
    public $payment_mode;
    public $differentaddress = false;

    public $s_first_name;
    public $s_last_name;
    public $s_mobile;
    public $s_country;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_state;
    public $s_zip_code;
    public $thankYou;

    public $card_number;
    public $expiry_month;
    public $expiry_year;
    public $cvc;

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.frontend.checkout')->extends('livewire.frontend.master');
    }

    public function verifyForCheckout()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer-login');
        } elseif ($this->thankYou) {
            return redirect()->route('thank-you');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('cart');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'mobile'        => 'required|numeric',
                'email'         => 'required',
                // 'country'       => 'required',
                'line1'         => 'required',
                'payment_mode'  => 'required'
            ]
        );
        if ($this->differentaddress) {
            $this->validateOnly(
                $fields,
                [
                    's_first_name'  => 'required',
                    's_last_name'   => 'required',
                    's_mobile'      => 'required|numeric',
                    // 's_country'     => 'required',
                    's_line1'       => 'required'
                ]
            );
        }

        if ($this->payment_mode == 'card') {
            $this->validateOnly(
                $fields,
                [
                    'card_number'  => 'required|numeric',
                    'expiry_month'   => 'required|numeric',
                    'expiry_year'      => 'required|numeric',
                    'cvc'       => 'required|numeric'
                ]
            );
        }
    }
    public function placeOrder()
    {
        # validateion
        $this->validate(
            [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'mobile'        => 'required|numeric',
                'email'         => 'required',
                // 'country'       => 'required',
                'line1'         => 'required',
                'payment_mode'  => 'required',
            ]
        );

        if ($this->payment_mode == 'card') {
            $this->validate(
                [
                    'card_number'  => 'required|numeric',
                    'expiry_month'   => 'required|numeric',
                    'expiry_year'      => 'required|numeric',
                    'cvc'       => 'required|numeric'
                ]
            );
        }
        # Save Order
        $order = new Order();
        $order->customer_id = Auth::guard('customer')->user()->id;
        $order->subtotal    = session()->get('checkout')['subtotal'];
        $order->discount    = session()->get('checkout')['discount'];
        $order->tax         = session()->get('checkout')['tax'];
        $order->total       = session()->get('checkout')['total'];
        $order->first_name  = $this->first_name;
        $order->last_name   = $this->last_name;
        $order->email       = $this->email;
        $order->mobile      = $this->mobile;
        $order->line1       = $this->line1;
        $order->line2       = $this->line2;
        $order->country     = $this->country;
        $order->city        = $this->city;
        $order->province    = $this->state;
        $order->zip_code    = $this->zip_code;
        $order->order_notes = $this->order_notes;
        $order->status      = 'ordered';
        $order->is_shiffing_different = $this->differentaddress ? 1 : 0;
        $order->save();

        $orderDetailData = array();
        foreach (Cart::instance('cart')->content() as $item) {
            $orderDetailData[] = array(
                'order_id' => $order->id,
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'size' => $item->options->size,
                'color' => 'undefine',
            );
        }
        OrderDetail::insert($orderDetailData);

        if ($this->differentaddress) {
            $this->validate(
                [
                    's_first_name'  => 'required',
                    's_last_name'   => 'required',
                    's_mobile'      => 'required|numeric',
                    // 's_country'     => 'required',
                    's_line1'       => 'required'
                ]
            );

            # Save form data
            $shipping = new Shipping();
            $shipping->order_id   = $order->id;
            $shipping->first_name = $this->s_first_name;
            $shipping->last_name  = $this->s_last_name;
            $shipping->mobile     = $this->s_mobile;
            $shipping->email      = $this->s_email;
            $shipping->country    = $this->s_country;
            $shipping->line1      = $this->s_line1;
            $shipping->line2      = $this->s_line2;
            $shipping->city       = $this->s_city;
            $shipping->state      = $this->s_state;
            $shipping->zip_code   = $this->s_zip_code;
            $shipping->save();
        }

        # Payment Section
        if ($this->payment_mode == 'cod') {
            
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();

        } elseif ($this->payment_mode == 'card') {

            $stripe = Stripe::make(env('STRIPE_KEY'));
            $customers = $stripe->customers()->all();

            foreach ($customers['data'] as $customer) {
                var_dump($customer['email']);
            }
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_number,
                        'exp_month' => $this->expiry_month,
                        'exp_year' => $this->expiry_year,
                        'cvc' => $this->cvc,
                    ]
                ]);

                if (!isset($token['id'])) {
                    $this->emit('error', 'the stripe token was not generated correctly.');
                    session()->flash('stripe_error', 'the stripe token was not generated correctly.');
                    $this->thankYou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->first_name . ' ' . $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zip_code,
                        'city' => $this->city,
                        'state' => $this->state,
                        'country' => $this->country,
                    ],
                    'shipping' => [
                        'name' => $this->first_name . ' ' . $this->last_name,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zip_code,
                            'city' => $this->city,
                            'state' => $this->state,
                            'country' => $this->country,
                        ],
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no - ' . $order->id
                ]);

                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    $this->emit('error', 'Error in transaction!');
                    session()->flash('stripe_error', 'Error in transaction!');
                    $this->thankYou = 0;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->emit('error', $e->getMessage());
                $this->thankYou = 0;
            }
            // $this->makeTransaction($order->id,'pending');
        }
    }

    public function resetCart()
    {
        $this->thankYou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($orderId, $status)
    {
        $transaction                = new Transaction();
        $transaction->customer_id   = Auth::guard('customer')->user()->id;
        $transaction->order_id      = $orderId;
        $transaction->mode          = $this->payment_mode;
        $transaction->status        = $status;
        $transaction->save();
    }
}
