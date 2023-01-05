<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class ShoppingCart extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        $this->emitTo('shopping-cart-icon','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
        $this->emitTo('shopping-cart-icon','refreshComponent');
    }

    public function delete($id){
        Cart::remove($id);
        $this->emitTo('shopping-cart-icon','refreshComponent');
        session()->flash("success-message","Item Removed.");
    }

    public function destroy(){
        Cart::destroy();
        $this->emitTo('shopping-cart-icon','refreshComponent');
        session()->flash("success-message","All Cleared.");
    }
    public function render()
    {
        return view('front-end.shopping-cart')->extends('front-end.master');
    }
}
