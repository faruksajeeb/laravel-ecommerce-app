<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Shipping;
use Livewire\Component;

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
    public $payment_method;

    public $s_first_name;
    public $s_last_name;
    public $s_mobile;
    public $s_country;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_state;
    public $s_zip_code;
    public function render()
    {
        return view('livewire.frontend.checkout')->extends('livewire.frontend.master');
    }

    public function saveCheckout(){
        # validateion
        $this->validate(

        );
        # Save form data
        $shipping = new Shipping();
        $shipping->first_name = $this->first_name;
        $shipping->last_name = $this->last_name;
        $shipping->mobile = $this->mobile;
        $shipping->email = $this->email;
        $shipping->country = $this->country;
        $shipping->line1 = $this->line1;
        $shipping->line2 = $this->line2;
        $shipping->city = $this->city;
        $shipping->state = $this->state;
        $shipping->zip_code = $this->zip_code;
        $shipping->order_notes = $this->order_notes;
        $shipping->payment_method = $this->payment_method;
        $shipping->save();
    }
}
