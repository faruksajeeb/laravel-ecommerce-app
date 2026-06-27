<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;

class RelatedProductsComponent extends Component
{
    public $categoryId;
    public $productId;
    public $relatedProducts;
    public function render()
    {
        $this->relatedProducts = Product::where('category_id',$this->categoryId)->where('id','!=',$this->productId)->inRandomOrder()->limit(4)->get();
        return view('livewire.frontend.related-products-component',['related_products'=>$this->relatedProducts]);
    }

    public function addToWishList($productId, $productName, $productPrice,$size,$productImage)
    {
        Cart::instance('wishlist')->add($productId, $productName, 1, $productPrice,['size'=>$size,'image'=>$productImage])->associate('\App\Models\Product');
        $this->emit('added', "Item added to the wishlist");
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
