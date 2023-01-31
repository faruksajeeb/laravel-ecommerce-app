<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Cart;

class ProductDetails extends Component
{
    
    public $color="white";
    public $size="M";
    public $quantity="1";

    public $productId;
    public $productName;
    public $productPrice;
    public $productImage;
    public function mount($productId){

        // $this->post = Post::find($id);
        // $this->review_replies = $this->post->review_replies;

        $this->productId = $productId;
        $product = Product::find($this->productId);
        $this->productName = $product->name;
        $this->productPrice = $product->sale_price;
        $this->productImage = $product->image;

        

    }


   
    // public function store($productId,$productName,$productPrice,$productSize=null,$productImage){
    public function store(){
      
        // Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Cart::instance('cart')->add($this->productId,$this->productName,$this->quantity,$this->productPrice,['size'=>$this->size,'color'=>$this->color,'image'=>$this->productImage])->associate('Product');
        // session()->flash("success-message","Item added into the cart.");
        // return redirect()->route('cart');
        $this->emit('added', "Item added to the cart");
        $this->emitTo('frontend.shopping-cart-icon', 'refreshComponent');
    }
    
    public function render()
    {
        

        $product = Product::where('id',$this->productId)->first();
        return view('livewire.frontend.product-details',[
            'product'=>$product
            ])->extends('livewire.frontend.master');
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
}
