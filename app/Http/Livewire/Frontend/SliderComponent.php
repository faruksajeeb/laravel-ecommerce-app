<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Slider;
use Livewire\Component;

class SliderComponent extends Component
{
    public function render()
    {
        $sliders = Slider::where('status',1)->get();
        return view('livewire.frontend.slider-component',['sliders'=>$sliders]);
    }
}
