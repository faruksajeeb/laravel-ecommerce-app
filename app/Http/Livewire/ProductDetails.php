<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
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
