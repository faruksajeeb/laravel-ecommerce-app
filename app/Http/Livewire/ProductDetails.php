<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class ProductDetails extends Component
{
    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('Product');
        session()->flash("success-message","Item added into the cart.");
        return redirect()->route('cart');
    }
    public $productId;
    public function mount($productId){
        $this->productId = $productId;
    }
    public function render()
    {
        $product = Product::where('id',$this->productId)->first();
        $relatedProducts = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->inRandomOrder()->limit(4)->get();
        $newProducts = Product::latest()->take(4)->get();
        return view('front-end.product-details',[
            'product'=>$product,
            'related_products'=>$relatedProducts,
            'new_products'=>$newProducts,
            ])->extends('front-end.master');
    }
}
