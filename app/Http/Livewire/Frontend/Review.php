<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Review as ProductReview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $productId;
    public $ratings = 5;
    public $comment;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function render()
    {
        $reviews = ProductReview::where('product_id', $this->productId)
            ->where('status', 1)
            ->latest()
            ->get();

        $avgRating = $reviews->avg('ratings') ?? 0;
        $totalReviews = $reviews->count();

        return view('livewire.frontend.review', [
            'reviews' => $reviews,
            'avgRating' => $avgRating,
            'totalReviews' => $totalReviews,
        ]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'ratings' => 'required|integer|min:1|max:5',
            'comment' => 'required|min:5',
        ]);
    }

    public function saveReview()
    {
        $this->validate([
            'ratings' => 'required|integer|min:1|max:5',
            'comment' => 'required|min:5',
        ]);

        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer-login');
        }

        $existing = ProductReview::where('product_id', $this->productId)
            ->where('customer_id', Auth::guard('customer')->user()->id)
            ->first();

        if ($existing) {
            $this->emit('error', 'You have already reviewed this product.');
            return;
        }

        $review = new ProductReview();
        $review->product_id = $this->productId;
        $review->customer_id = Auth::guard('customer')->user()->id;
        $review->customer_name = Auth::guard('customer')->user()->customer_name;
        $review->ratings = $this->ratings;
        $review->comment = $this->comment;
        $review->status = 1;
        $review->save();

        $this->reset(['comment']);
        $this->ratings = 5;
        $this->emit('added', 'Review submitted successfully!');
    }
}
