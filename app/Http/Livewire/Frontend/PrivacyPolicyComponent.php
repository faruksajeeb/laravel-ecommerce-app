<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.privacy-policy-component')->extends('livewire.frontend.master');
    }
}
