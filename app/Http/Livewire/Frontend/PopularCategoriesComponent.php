<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class PopularCategoriesComponent extends Component
{
    public function render()
    {
        $popularCategories = Category::where('status',1)->where('is_popular',1)->take(6)->get();
        return view('livewire.frontend.popular-categories-component',['popular_categories'=>$popularCategories]);
    }
}
