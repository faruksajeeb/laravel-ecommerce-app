<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class FilterByCategory extends Component
{
    public $categoryId=NULL;
    public $route=NULL;
    public function mount($route){
        $this->route = $route;
    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.frontend.filter-by-category',['categories'=>$categories]);
    }
    public function filterByCategory($id){
        $this->emit('categoryId', $id);
        if($this->route=='product-details'){
            return redirect()->to('/shop');
        }        
        $this->emitTo('frontend.shop','refreshComponent');
        $this->emitTo('frontend.filter-by-price','refreshComponent');
    }
}
