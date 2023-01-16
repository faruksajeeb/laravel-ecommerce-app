<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Http\Request;

class ShoppingCart extends Component
{
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function applyCouponCode(Request $request)
    {
      //  dd(session()->get('coupon'));
        $cartSubTotal = str_replace(',', '', Cart::instance('cart')->subtotal());
        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value', '<=', $cartSubTotal)->first();
        if (!$coupon || (empty($coupon))) {
           
            $this->emit('error', "Your coupon code is invalid.");
            //session()->flash("success-message", "Your coupon code is invalid.");
        }else{
            
            session()->put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);
           $this->emit('added', "Your coupon code Applied.");
        //    dd(session()->get('coupon'));
        }
       
    }

    public function calculateDiscount()
    {

        $couponValue = session()->get('coupon')['value'];
        $cartSubtotal = str_replace(",", "", Cart::instance('cart')->subtotal());
        if (session()->get('coupon')['type'] == 'fixed') {
            $this->discount = $couponValue;
        } else {
            $this->discount = ($cartSubtotal * $couponValue) / 100;
        }
        $this->subtotalAfterDiscount = $cartSubtotal - $this->discount;
        $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
        $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
    }
    public function render()
    {
       # session()->forget('coupon');
        if (session()->has('coupon')) {
            
            $couponCartValue = session()->get('coupon')['cart_value'];
            $cartSubtotal = str_replace(",", "", Cart::instance('cart')->subtotal());
            // dd($cartSubtotal);
            if ($cartSubtotal < $couponCartValue) {
               
                session()->forget('coupon');
            }
            else {
                if (!empty(session()->get('coupon'))) :
                    $this->calculateDiscount();
                endif;
            }
        }
        return view('livewire.frontend.shopping-cart')->extends('livewire.frontend.master');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('shopping-cart-icon', 'refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
    }

    public function delete($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
        session()->flash("success-message", "Item Removed.");
    }

    public function destroy()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
        session()->flash("success-message", "All Cleared.");
    }
}
