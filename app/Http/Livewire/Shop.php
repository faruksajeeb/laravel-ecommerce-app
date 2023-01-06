<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;

class Shop extends Component
{
    public $pageSize=12;
    public $orderBy = "Default Sorting";

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($order){
        $this->orderBy = $order;
    }

    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('App\Models\Product');
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('shopping-cart-icon','refreshComponent');
        // return redirect()->route('cart');
    }
   

    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $query = Product::select('*');  

        if($this->orderBy=='Price: Low to High'){
               $query->orderBy('sale_price','ASC');
        }elseif($this->orderBy=='Price: High to Low'){
                $query->orderBy('sale_price','DESC');
        }elseif($this->orderBy=='Release Date'){
            $query->orderBy('created_at','DESC');
        }else{
        }
        $products = $query->paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('front-end.shop',[
            'products'=>$products,
            'categories'=>$categories,
            ])
        ->extends('front-end.master');
        // ->layout('front-end.master');
        // return view('front-end.shop',['products'=>$products]);
    }
}
