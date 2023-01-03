<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        return view('front-end.shop')->extends('front-end.master');
    }
}
