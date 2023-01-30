<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;

class Home extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
      
        $featureProducts = Product::where('featured','yes')->where('status',1)->get()->take(8);
        $popularProducts = Product::latest()->get()->take(8); //From order details by product id group by product id take top 8/
        $newProducts = Product::latest()->where('status',1)->get()->take(8);
        return view('livewire.frontend.home',[
             'feature_products' => $featureProducts,
             'popular_products' => $popularProducts,
             'new_products' => $newProducts,
        ])->extends('livewire.frontend.master');
    }
    public function store($productId,$productName,$productPrice,$productSize=null,$productImage){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($productId,$productName,1,$productPrice,['size'=>$productSize,'image'=>$productImage])->associate('App\Models\Product');

        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        // return redirect()->route('cart');
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
