<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $q;
    public function mount(){
        $this->fill(request()->only('q'));
    }
    public function render()
    {
        return view('livewire.frontend.header-search-component');
    }
}
