<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;
class NewArrivalsComponent extends Component
{
    public function render()
    {
        $latestProducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.frontend.new-arrivals-component',['latest_products'=>$latestProducts]);
    }

    public function addToWishList($productId, $productName, $productPrice,$size,$productImage)
    {
        Cart::instance('wishlist')->add($productId, $productName, 1, $productPrice,['size'=>$size,'image'=>$productImage])->associate('\App\Models\Product');
        $this->emit('added', "Item added to the wishlist");
        $this->emitTo('frontend.home', 'refreshComponent');
        $this->emitTo('frontend.wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item) :
            if ($item->id == $product_id) :
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('frontend.wishlist-icon-component', 'refreshComponent');
                $this->emit('added', "Item removed from the wishlist");
            endif;
        endforeach;
    }
}
