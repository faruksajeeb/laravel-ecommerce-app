<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerLogin extends Component
{
    public function render()
    {
        return view('front-end.customer-login')->extends('front-end.master');
    }
}
