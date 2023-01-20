<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ThankYouComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.thank-you-component')->extends('livewire.frontend.master');
    }
}
