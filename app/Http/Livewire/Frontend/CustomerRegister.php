<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CustomerRegister extends Component
{
    public function render()
    {
        return view('livewire.frontend.customer-register')->extends('livewire.frontend.master');
    }
}
