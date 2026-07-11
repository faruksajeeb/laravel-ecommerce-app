<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Review;
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

        # Default selection to the first available variation (if any)
        $firstVariation = ProductVariation::where('product_id', $this->productId)->first();
        if ($firstVariation) {
            if ($firstVariation->size) {
                $this->size = $firstVariation->size;
            }
            if ($firstVariation->color) {
                $this->color = $firstVariation->color;
            }
        }

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

        $reviews = Review::where('product_id', $this->productId)
            ->where('status', 1)
            ->get();
        $avgRating = $reviews->avg('ratings') ?? 0;
        $totalReviews = $reviews->count();

        $hasVariations = ProductVariation::where('product_id', $this->productId)->exists();

        # Available sizes/colors come from product_variations (preferred) and the
        # product's own size/color text fields (fallback).
        $variationSizes = ProductVariation::where('product_id', $this->productId)
            ->distinct()->pluck('size')->filter()->values();
        $variationColors = ProductVariation::where('product_id', $this->productId)
            ->distinct()->pluck('color')->filter()->values();

        $manualSizes = $product->size
            ? collect(array_filter(array_map('trim', explode(',', $product->size)))) : collect();
        $manualColors = $product->color
            ? collect(array_filter(array_map('trim', explode(',', $product->color)))) : collect();

        $availableSizes = $manualSizes->merge($variationSizes)->unique()->values();
        $availableColors = $manualColors->merge($variationColors)->unique()->values();

        $variationStock = null;
        if ($hasVariations && $this->size && $this->color) {
            $variation = ProductVariation::where('product_id', $this->productId)
                ->whereRaw('LOWER(size) = ?', [strtolower($this->size)])
                ->whereRaw('LOWER(color) = ?', [strtolower($this->color)])
                ->first();
            $variationStock = $variation ? (int) $variation->quantity : 0;
        }

        return view('livewire.frontend.product-details',[
            'product'=>$product,
            'avgRating'=>$avgRating,
            'totalReviews'=>$totalReviews,
            'hasVariations'=>$hasVariations,
            'variationStock'=>$variationStock,
            'availableSizes'=>$availableSizes,
            'availableColors'=>$availableColors
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

    public function addToCompare($productId, $productName, $productPrice, $productImage)
    {
        $exists = Cart::instance('compare')->search(function ($cartItem) use ($productId) {
            return $cartItem->id == $productId;
        });
        if ($exists->isNotEmpty()) {
            $this->emit('added', "Item already in compare list");
            return;
        }
        if (Cart::instance('compare')->count() >= 4) {
            $this->emit('error', "You can compare up to 4 products");
            return;
        }
        Cart::instance('compare')->add($productId, $productName, 1, $productPrice, ['image' => $productImage])
            ->associate('\App\Models\Product');
        $this->emit('added', "Item added to compare");
        $this->emitTo('frontend.compare-icon-component', 'refreshComponent');
    }

    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare')->content() as $item) :
            if ($item->id == $product_id) :
                Cart::instance('compare')->remove($item->rowId);
                $this->emitTo('frontend.compare-icon-component', 'refreshComponent');
                $this->emit('added', "Item removed from compare");
            endif;
        endforeach;
    }
}
