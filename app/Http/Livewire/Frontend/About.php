<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.frontend.about')->extends('livewire.frontend.master');
    }
}
