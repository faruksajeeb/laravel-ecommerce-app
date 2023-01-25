@push('styles')
        <style>
            .wishlisted {
                background-color: #F15412 !important;
                border: 1px solid transparent !important;
            }

            .wishlisted i {
                color: #fff !important;
            }
        </style>
    @endpush
<div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div wire:ignore class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                </div>
                <div  class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @php
                        $wishItems = Cart::instance('wishlist')
                            ->content()
                            ->pluck('id');
                    @endphp
                    @foreach ($latest_products as $latest_product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product-details', ['productId' => $latest_product->id]) }}">
                                        <img class="default-img "
                                            src="{{ asset('frontend-assets/imgs/products') }}/{{ $latest_product->image }}"
                                            alt="{{ $latest_product->name }}" width="150">
                                        <img class="hover-img"
                                            src="{{ asset('frontend-assets/imgs/products') }}/{{ $latest_product->image }}"
                                            alt="{{ $latest_product->name }}" width="150">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    @if ($wishItems->contains($latest_product->id))
                                        <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                            href="#"
                                            wire:click.prevent='removeFromWishList({{ $latest_product->id }})'><i
                                                class="fi-rs-heart"></i></a>
                                    @else
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" 
                                            wire:click.prevent='addToWishList({{ $latest_product->id }},"{{ $latest_product->name }}",{{ $latest_product->sale_price }},"M","{{ $latest_product->image }}")'><i
                                                class="fi-rs-heart"></i></a>
                                    @endif
                                    <a aria-label="Compare" class="action-btn small hover-up" href="#"
                                        tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a
                                        href="{{ route('product-details', ['productId' => $latest_product->id]) }}">{{ $latest_product->name }}</a>
                                </h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>৳{{ $latest_product->sale_price }} </span>
                                    <span class="old-price">৳{{ $latest_product->regular_price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
