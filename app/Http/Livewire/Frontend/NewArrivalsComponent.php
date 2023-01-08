<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class NewArrivalsComponent extends Component
{
    public function render()
    {
        $latestProducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.frontend.new-arrivals-component',['latest_products'=>$latestProducts]);
    }
}
