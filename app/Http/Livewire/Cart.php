<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('front-end.cart')->extends('front-end.master');
    }
}
