<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('front-end.home',[])->extends('front-end.master');
    }
}
