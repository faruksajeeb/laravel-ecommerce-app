<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\ReviewReply;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;

class ProductDetails extends Component
{
    
    public $color="white";
    public $size="M";
    public $quantity="1";

    public $productId;
    public $productName;
    public $productPrice;
    public $productImage;
    public $reviews=[];
    public $totalReview;
    public $avgRatings;
    public $avgRatingPercentage;
    public $fiveStars = 0;
    public $fourStars = 0;
    public $threeStars = 0;
    public $twoStars = 0;
    public $oneStars = 0;
    public $fiveStartPercenteage = 0;
    public $fourStartPercenteage = 0;
    public $threeStartPercenteage = 0;
    public $twoStartPercenteage = 0;
    public $oneStartPercenteage = 0;

    public $review_reply='';
    public $comments = [];
    public function mount($productId){

        // $this->post = Post::find($id);
        // $this->review_replies = $this->post->review_replies;

        $this->productId = $productId;
        $product = Product::find($this->productId);
        $this->productName = $product->name;
        $this->productPrice = $product->sale_price;
        $this->productImage = $product->image;

        

    }

    // public function updated($fields){
    //     $this->validate($fields,[
    //         'review_reply' => 'required'
    //       ]);
    // }

    public function addReply($id)
    {
     
      $this->validate([
        'review_reply' => 'required'
      ]);
      
      
      $reviewReply = ReviewReply::create([
        'review_id' => $id,
        'replied_by' => 'admin',
        'comment' => $this->review_reply
      ]);
    //   array_push($this->comments ,$reviewReply);
      $this->comments->push($reviewReply);
      $this->review_reply = '';
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
        $this->comments = ReviewReply::where('review_id',5)->get();
        $this->reviews =DB::table('reviews')
        ->join('order_details', 'reviews.order_item_id', '=', 'order_details.id')
        ->join('customers', 'reviews.customer_id', '=', 'customers.id')
        ->select('reviews.*','customers.name as customer_name')
        ->where('order_details.product_id',$this->productId)
        ->get();
        $this->totalReview = count($this->reviews);
        $totalRatings=0;
        foreach($this->reviews as $item){
            if($item->ratings==5){
                $this->fiveStars +=1;
            }elseif($item->ratings==4){
                $this->fourStars +=1;
            }elseif($item->ratings==3){
                $this->threeStars +=1;
            }elseif($item->ratings==2){
                $this->twoStars +=1;
            }elseif($item->ratings==1){
                $this->oneStars +=1;
            }
            $totalRatings += $item->ratings;
        }

        $this->avgRatings = $totalRatings/$this->totalReview;
        $this->avgRatingPercentage = $this->avgRatings*20; // total 100%

        $this->fiveStartPercenteage = ($this->fiveStars/$this->totalReview)*100;
        $this->fourStartPercenteage = ($this->fourStars/$this->totalReview)*100;
        $this->threeStartPercenteage = ($this->threeStars/$this->totalReview)*100;
        $this->twoStartPercenteage = ($this->twoStars/$this->totalReview)*100;
        $this->oneStartPercenteage = ($this->oneStars/$this->totalReview)*100;

        $product = Product::where('id',$this->productId)->first();
        return view('livewire.frontend.product-details',[
            'product'=>$product,
            'reviews' =>  $this->reviews,
            'avgRatings' =>  $this->avgRatings,
            'avgRatingPercentage' =>  $this->avgRatingPercentage,
            'comments' =>  $this->comments,
            'starPercentage' => [
                'five' => $this->fiveStartPercenteage,
                'four' => $this->fourStartPercenteage,
                'three' => $this->threeStartPercenteage,
                'two' => $this->twoStartPercenteage,
                'one' => $this->oneStartPercenteage,
            ],
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
