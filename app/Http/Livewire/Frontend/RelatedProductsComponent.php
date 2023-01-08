<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class RelatedProductsComponent extends Component
{
    public $categoryId;
    public $productId;
    public $relatedProducts;
    public function render()
    {
        $this->relatedProducts = Product::where('category_id',$this->categoryId)->where('id','!=',$this->productId)->inRandomOrder()->limit(4)->get();
        return view('livewire.frontend.related-products-component',['related_products'=>$this->relatedProducts]);
    }
}
