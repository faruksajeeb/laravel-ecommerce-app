<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerRegister extends Component
{
    public function render()
    {
        return view('front-end.customer-register')->extends('front-end.master');
    }
}
