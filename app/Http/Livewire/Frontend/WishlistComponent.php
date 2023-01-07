<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishList($product_id){
        foreach(Cart::instance('wishlist')->content() as $item):
            if($item->id==$product_id):
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('frontend.wishlist-icon-component','refreshComponent');
                $this->emit('added',"Item removed from the wishlist");
            endif;
        endforeach;
    }
    public function moveProductToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price,['size'=>'M'])->associate('App\Models\Product');
        $this->emitTo('frontend.wishlist-icon-component','refreshComponent');
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        $this->emit('added',"Item added to cart");
    }
    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('App\Models\Product');
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        // return redirect()->route('cart');
    }
    public function render()
    {
        return view('livewire.frontend.wishlist-component')->extends('livewire.frontend.master');
    }
}
