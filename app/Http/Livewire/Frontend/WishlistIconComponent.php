<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class WishlistIconComponent extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.frontend.wishlist-icon-component');
    }
}
