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
        return view('front-end.product-details',['product'=>$product])->extends('front-end.master');
    }
}
