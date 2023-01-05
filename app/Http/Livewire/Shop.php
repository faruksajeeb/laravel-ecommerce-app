<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;

class Shop extends Component
{
    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('App\Models\Product');
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('shopping-cart-icon','refreshComponent');
        // return redirect()->route('cart');
    }
    public $pazeSize;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        } else {
            $paze_size = 12;
        }
        $products = Product::paginate($paze_size);
        return view('front-end.shop',['products'=>$products])
        ->extends('front-end.master');
        // ->layout('front-end.master');
        // return view('front-end.shop',['products'=>$products]);
    }
}
