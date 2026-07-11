<div>
    <div class="comments-area">
        <div class="row">
            <div class="col-lg-4">
                <div class="summary br-2">
                    <div class="rating-box d-flex align-items-center justify-content-between">
                        <div class="rating-number">
                            <h2 class="mb-0">{{ number_format($avgRating, 1) }}</h2>
                            <p class="font-xs text-muted mb-0">out of 5</p>
                        </div>
                        <div class="rating-stars">
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:{{ ($avgRating * 100) / 5 }}%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted">({{ $totalReviews }}
                                    review{{ $totalReviews == 1 ? '' : 's' }})</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="mb-30">{{ $totalReviews }} Review{{ $totalReviews == 1 ? '' : 's' }}</h4>
                @forelse ($reviews as $item)
                    <div class="single-comment justify-content-between d-flex mb-30">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb text-center">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:#fde2e2;color:#e9595b;display:flex;align-items:center;justify-content:center;font-weight:700;">
                                    {{ strtoupper(substr($item->customer_name ?? 'A', 0, 1)) }}
                                </div>
                                <h6 class="mt-10 mb-0">{{ $item->customer_name ?? 'Anonymous' }}</h6>
                            </div>
                            <div class="desc">
                                <div class="product-rate-cover text-left">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:{{ ($item->ratings * 100) / 5 }}%">
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-10 mt-10">{{ $item->comment }}</p>
                                <span
                                    class="font-xs text-muted">{{ $item->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">There are no reviews yet. Be the first to review this product.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="comment-form mt-30">
        <h4 class="mb-15">Write a Review</h4>

        @if (!Auth::guard('customer')->check())
            <div class="alert alert-warning">
                Please <a href="{{ route('customer-login') }}">login</a> to write a review.
            </div>
        @else
            <form wire:submit.prevent="saveReview">
                <div class="row">
                    <div class="col-12 mb-20">
                        <span class="d-inline-block mr-10 font-sm" style="font-weight:600;">Your Rating:</span>
                        <div class="star-input d-inline-block align-middle" wire:ignore>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="star @if ($i <= $ratings) active @endif" data-value="{{ $i }}"
                                    style="cursor:pointer; font-size:24px; color:{{ $i <= $ratings ? '#ffb503' : '#ddd' }};">&#9733;</i>
                            @endfor
                        </div>
                        <input type="hidden" wire:model="ratings">
                        @error('ratings')
                            <span class="text-danger ml-10 font-sm d-block mt-5">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-20">
                        <textarea class="form-control" placeholder="Write your review here..." rows="4"
                            wire:model="comment"></textarea>
                        @error('comment')
                            <span class="text-danger font-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button button-contactForm">Submit Review</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.star-input .star').on('click', function() {
                var val = $(this).data('value');
                @this.set('ratings', val);
                $('.star-input .star').each(function() {
                    $(this).css('color', $(this).data('value') <= val ? '#ffb503' : '#ddd');
                });
            });
        });
    </script>
@endpush
