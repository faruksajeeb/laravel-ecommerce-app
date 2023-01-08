<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;

class ProductDetails extends Component
{
    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('Product');
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
        return view('livewire.frontend.product-details',[
            'product'=>$product,
            ])->extends('livewire.frontend.master');
    }
}
