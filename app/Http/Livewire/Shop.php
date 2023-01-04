<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class Shop extends Component
{
    public $pazeSize;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        } else {
            $paze_size = 12;
        }
        $products = Product::paginate($paze_size);
        return view('front-end.shop',['products'=>$products])
        ->extends('front-end.master');
        // ->layout('front-end.master');
        // return view('front-end.shop',['products'=>$products]);
    }
}
