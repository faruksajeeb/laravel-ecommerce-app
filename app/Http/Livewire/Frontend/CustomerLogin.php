<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CustomerLogin extends Component
{
    public function render()
    {
        return view('livewire.frontend.customer-login')->extends('livewire.frontend.master');
    }
}
