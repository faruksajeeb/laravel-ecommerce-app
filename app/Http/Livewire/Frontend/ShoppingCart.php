<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Cart;
class ShoppingCart extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('shopping-cart-icon','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
    }

    public function delete($id){
        Cart::instance('cart')->remove($id);
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        session()->flash("success-message","Item Removed.");
    }

    public function destroy(){
        Cart::instance('cart')->destroy();
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        session()->flash("success-message","All Cleared.");
    }
    public function render()
    {
        return view('livewire.frontend.shopping-cart')->extends('livewire.frontend.master');
    }
}
