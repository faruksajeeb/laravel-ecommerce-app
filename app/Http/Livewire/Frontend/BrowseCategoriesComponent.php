<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use Illuminate\Routing\Route;
use Livewire\Component;

class BrowseCategoriesComponent extends Component
{
    public $categoryId=NULL;
   // public $route=Route::currentRouteName();
    // public function mount($route){
    //     $this->route = $route;
    // }
    public function render()
    {
        $categories = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('livewire.frontend.browse-categories-component',[
            'categories' => $categories,
        ]);
    }

    public function filterByCategory($id){
        $this->emit('categoryId', $id);
    }
}
