<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('front-end.checkout')->extends('front-end.master');
    }
}
