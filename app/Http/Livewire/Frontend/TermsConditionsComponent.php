<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class TermsConditionsComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.terms-conditions-component')->extends('livewire.frontend.master');
    }
}
