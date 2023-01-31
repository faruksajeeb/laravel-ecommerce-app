<?php

namespace App\Http\Livewire\Frontend;

use App\Models\OrderDetail;
use App\Models\Review;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OrderItemReviewComponent extends Component
{
    public $tableName = 'reviews';
    public $btnDisabled = 0;
    public $productName;
    public $productId;
    public $productImage;
    public $orderItemId;
    public $orderDetail;

    public $ratings=5;
    public $comment;

    public function mount($orderItemId)
    {
        $this->orderItemId = $orderItemId;
        $this->orderDetail = OrderDetail::find($orderItemId);
    }
    public function render()
    {
        return view('livewire.frontend.order-item-review-component', [
            'orderItemDetails' => $this->orderDetail
        ])->extends('livewire.frontend.master');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'ratings' => 'required',
            'comment' => 'required'
        ]);
    }

    public function saveReview()
    {
        $this->validate([
            'ratings' => 'required',
            'comment' => 'required'
        ]);

     
        $exist = Review::where('customer_id', Auth::guard('customer')->user()->id)
            ->where('order_item_id', $this->orderItemId)->get();
        if (count($exist) > 0) {
            $this->emit('error', "Review already exist on this order item.");
        } else {
            try {
                $this->btnDisabled = 1;
                $review = new Review();
                $review->ratings = $this->ratings;
                $review->comment = $this->comment;
                $review->order_item_id = $this->orderItemId;
                $review->customer_id = Auth::guard('customer')->user()->id;
                $review->save();

                $orderDetail = OrderDetail::find($this->orderItemId);
                $orderDetail->rstatus = true;
                $orderDetail->save();
                $this->btnDisabled = 0;
                $this->resetInput();
                $this->emit('added', 'Review added successfully!');
            } catch (Exception $e) {
                $this->emit('error', $e->getMessage());
            }
        }
    }

    public function resetInput()
    {
        $this->ratings = '';
        $this->comment = '';
    }
}
