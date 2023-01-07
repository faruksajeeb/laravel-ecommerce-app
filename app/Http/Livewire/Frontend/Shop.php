<?php

namespace App\Http\Livewire\Frontend;

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
    public $categoryId;
    public $categoryName;
    public $minPrice = 0;
    public $maxPrice = 1000;

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($order){
        $this->orderBy = $order;
    }

    public function filterByCategory($id){
        $this->categoryId = $id;
    }

    public function addToWishList($productId,$productName,$productPrice){
        Cart::instance('wishlist')->add($productId,$productName,1,$productPrice)->associate('\App\Models\Product');
        $this->emit('added',"Item added to the wishlist");
        $this->emitTo('frontend.wishlist-icon-component','refreshComponent');
    }

    public function removeFromWishList($product_id){
        foreach(Cart::instance('wishlist')->content() as $item):
            if($item->id==$product_id):
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('frontend.wishlist-icon-component','refreshComponent');
                $this->emit('added',"Item removed from the wishlist");
            endif;
        endforeach;
    }

    public function store($productId,$productName,$productPrice,$productSize=null){
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($productId,$productName,1,$productPrice,['size'=>$productSize])->associate('App\Models\Product');
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added',"Item added");
        $this->emitTo('frontend.shopping-cart-icon','refreshComponent');
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
        if($this->categoryId !=null){
            $query->where('category_id',$this->categoryId);
            $category = Category::where('id',$this->categoryId)->first();
            $this->categoryName = $category->name;
        }
        $query->whereBetween('sale_price',[$this->minPrice,$this->maxPrice]);
        $products = $query->paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.frontend.shop',[
            'products'=>$products,
            'categories'=>$categories,
            ])
        ->extends('livewire.frontend.master');
        // ->layout('front-end.master');
        // return view('front-end.shop',['products'=>$products]);
    }
}
