<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('front-end.about')->extends('front-end.master');
    }
}
