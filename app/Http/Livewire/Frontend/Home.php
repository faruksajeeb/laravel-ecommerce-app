<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
      
        return view('livewire.frontend.home',[
            // 'latest_products' => $latestProducts
        ])->extends('livewire.frontend.master');
    }
}
