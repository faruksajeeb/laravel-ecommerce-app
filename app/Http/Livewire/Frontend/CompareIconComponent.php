<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CompareIconComponent extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.frontend.compare-icon-component');
    }
}
