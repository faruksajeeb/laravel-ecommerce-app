<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CompareComponent extends Component
{
    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare')->content() as $item) {
            if ($item->id == $product_id) {
                Cart::instance('compare')->remove($item->rowId);
                $this->emitTo('frontend.compare-icon-component', 'refreshComponent');
                $this->emit('added', "Item removed from compare");
            }
        }
    }

    public function clearCompare()
    {
        Cart::instance('compare')->destroy();
        $this->emitTo('frontend.compare-icon-component', 'refreshComponent');
        $this->emit('added', "Compare list cleared");
    }

    public function moveProductToCart($rowId)
    {
        $item = Cart::instance('compare')->get($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price, [
            'size' => $item->options->size ?? null,
            'image' => $item->options->image
        ])->associate('App\Models\Product');
        $this->emitTo('frontend.compare-icon-component', 'refreshComponent');
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
        $this->emit('added', "Item added to cart");
    }

    public function render()
    {
        return view('livewire.frontend.compare-component')->extends('livewire.frontend.master');
    }
}
