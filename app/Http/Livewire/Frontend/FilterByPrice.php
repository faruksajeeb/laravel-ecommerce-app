<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class FilterByPrice extends Component
{
    public $minPrice=0;
    public $maxPrice=10000;
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        $this->emit('minPrice', $this->minPrice);
        $this->emit('maxPrice', $this->maxPrice);
        return view('livewire.frontend.filter-by-price');
       
    }
}
