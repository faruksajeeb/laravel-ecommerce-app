<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class NewProductsComponent extends Component
{
    public function render()
    {
        $newProducts = Product::latest()->take(4)->get();
        return view('livewire.frontend.new-products-component',['new_products'=>$newProducts]);
    }
}
