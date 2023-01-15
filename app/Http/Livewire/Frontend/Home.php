<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;

class Home extends Component
{
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
    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('App\Models\Product');
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
        // return redirect()->route('cart');
    }
}
