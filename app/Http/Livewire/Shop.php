<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class Shop extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        return view('front-end.shop',['products'=>$products])->extends('front-end.master');
    }
}
