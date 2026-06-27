<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartIcon extends Component
{
    protected $listeners = [
        
        'refreshComponent' => '$refresh'
    ];
    // public function delete($id){
    //     Cart::remove($id);
    //     session()->flash("success-message","Item Removed.");
    //     return redirect()->route('cart');
    // }
    public function render()
    {
        // return view('front-end.shopping-cart-icon')->extends('front-end.master');
        // return view('livewire.shopping-cart-icon')->extends('front-end.master');
        return view('livewire.frontend.shopping-cart-icon');
    }

    public function checkOut(){
        if(Auth::guard('customer')->check()){
            redirect()->route('checkout');
        }else{
            redirect()->route('customer-login');
        }
    }

    public function delete($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
        $this->emitTo('frontend.shopping-cart', 'refreshComponent');
        session()->flash("success-message", "Item Removed.");
    }
}
