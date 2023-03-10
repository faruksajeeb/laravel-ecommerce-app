<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Subcategory;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;

class Shop extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pageSize = 12;
    public $orderBy = "Default Sorting";
    public $categoryId=NULL;
    public $subcategoryId=NULL;
    public $minPrice = 0;
    public $maxPrice = 5000;
    public $categoryName;
    public $subcategoryName;

    protected $listeners = [
        'categoryId',
        'subcategoryId',
        'minPrice',
        'maxPrice',
        'refreshComponent' => '$refresh'
    ];
    // public function mount($categoryId){
    //     $this->categoryId = $categoryId;
    // }
    public function categoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function subcategoryId($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
    }
    public function maxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }
    public function minPrice($minPrice)
    {
        $this->minPrice = $minPrice;
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function filterByCategory($id)
    {
        $this->categoryId = $id;
    }

    public function addToWishList($productId, $productName, $productPrice,$size,$productImage)
    {
        Cart::instance('wishlist')->add($productId, $productName, 1, $productPrice,['size'=>$size,'image'=>$productImage])->associate('\App\Models\Product');
        $this->emit('added', "Item added to the wishlist");
        $this->emitTo('frontend.wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item) :
            if ($item->id == $product_id) :
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('frontend.wishlist-icon-component', 'refreshComponent');
                $this->emit('added', "Item removed from the wishlist");
            endif;
        endforeach;
    }

    public function store($id, $name, $price, $size = null, $image)
    {
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add(array(
            'id' => $id,
            'name' => $name, 
            'qty' => 1, 
            'price' => $price,
            'options' => [
                'size' => $size,
                'image' => $image
            ]
            ))->associate('App\Models\Product');
        
        //session()->flash("success-message","Item added into the cart.");
        $this->emit('added', "Item added");
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
        // return redirect()->route('cart');
    }



    
    public function render()
    {
        $query = Product::select('*');

        if ($this->orderBy == 'Price: Low to High') {
            $query->orderBy('sale_price', 'ASC');
        } elseif ($this->orderBy == 'Price: High to Low') {
            $query->orderBy('sale_price', 'DESC');
        } elseif ($this->orderBy == 'Release Date') {
            $query->orderBy('created_at', 'DESC');
        } else {
        }
        if ($this->categoryId != null) {           
            $query->where('category_id', $this->categoryId);
            $category = Category::where('id', $this->categoryId)->first();
            $this->categoryName = $category->name;
        }elseif($this->subcategoryId !=null){
            $query->where('products.subcategory_id',$this->subcategoryId);
            $subcategory = Subcategory::where('id',$this->subcategoryId)->first();
            $this->subcategoryName = $subcategory->subcategory_name;
        }
        
        $query->whereBetween('sale_price', [$this->minPrice, $this->maxPrice]);
        $products = $query->paginate($this->pageSize);

        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.frontend.shop', [
            'products' => $products,
            'categories' => $categories,
        ])
            ->extends('livewire.frontend.master');
        // ->layout('front-end.master');
        // return view('front-end.shop',['products'=>$products]);
    }
}
