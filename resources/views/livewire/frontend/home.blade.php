<div>
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
    @livewire('frontend.slider-component')

    {{-- @livewire('frontend.featured-component') --}}
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                            type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                            type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                            type="button" role="tab" aria-controls="tab-three" aria-selected="false">New
                            added</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">View More<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @php
                            $wishItems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        @endphp
                        @foreach ($feature_products as $feature_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="{{ route('product-details', ['productId' => $feature_product->id]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $feature_product->image }}"
                                                    alt="{{ $feature_product->name }}">
                                                <img class="hover-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $feature_product->image }}"
                                                    alt="{{ $feature_product->name }}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            @if ($wishItems->contains($feature_product->id))
                                                <a aria-label="Remove from Wishlist"
                                                    class="action-btn hover-up wishlisted" href="#"
                                                    wire:click.prevent='removeFromWishList({{ $feature_product->id }})'><i
                                                        class="fi-rs-heart"></i></a>
                                            @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent='addToWishList({{ $feature_product->id }},"{{ $feature_product->name }}",{{ $feature_product->sale_price }},"M","{{ $feature_product->image }}")'><i
                                                        class="fi-rs-heart"></i></a>
                                            @endif
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Clothing</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product-details', ['productId' => $feature_product->id]) }}">Colorful
                                                Pattern Shirts</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳ {{ $feature_product->sale_price }} </span>
                                            <span class="old-price">৳ {{ $feature_product->regular_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store({{ $feature_product->id }},'{{ $feature_product->name }}',{{ $feature_product->sale_price }},'M','{{ $feature_product->image }}')"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($new_products as $new_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="{{ route('product-details', ['productId' => $new_product->id]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $new_product->image }}"
                                                    alt="">
                                                <img class="hover-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $new_product->image }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                                    @if ($wishItems->contains($new_product->id))
                                                    <a aria-label="Remove from Wishlist"
                                                        class="action-btn hover-up wishlisted" href="#"
                                                        wire:click.prevent='removeFromWishList({{ $new_product->id }})'><i
                                                            class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        href="#"
                                                        wire:click.prevent='addToWishList({{ $new_product->id }},"{{ $new_product->name }}",{{ $new_product->sale_price }},"M","{{ $new_product->image }}")'><i
                                                            class="fi-rs-heart"></i></a>
                                                @endif
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Donec </a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product-details', ['productId' => $new_product->id]) }}">{{ $new_product->name }}</a>
                                        </h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳ {{ $new_product->sale_price }} </span>
                                            <span class="old-price">৳ {{ $new_product->regular_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store({{ $new_product->id }},'{{ $new_product->name }}',{{ $new_product->sale_price }},'M','{{$new_product->image}}')"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($popular_products as $popular_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="{{ route('product-details', ['productId' => $popular_product->id]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $popular_product->image }}"
                                                    alt="">
                                                <img class="hover-img"
                                                    src="{{ asset('frontend-assets/imgs/products') }}/{{ $popular_product->image }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                                    @if ($wishItems->contains($feature_product->id))
                                                    <a aria-label="Remove from Wishlist"
                                                        class="action-btn hover-up wishlisted" href="#"
                                                        wire:click.prevent='removeFromWishList({{ $feature_product->id }})'><i
                                                            class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        href="#"
                                                        wire:click.prevent='addToWishList({{ $feature_product->id }},"{{ $feature_product->name }}",{{ $feature_product->sale_price }},"M","{{ $feature_product->image }}")'><i
                                                            class="fi-rs-heart"></i></a>
                                                @endif
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Music</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product-details', ['productId' => $popular_product->id]) }}">Donec
                                                ut nisl rutrum</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳ {{ $popular_product->sale_price }} </span>
                                            <span class="old-price">৳ {{ $popular_product->regular_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store({{ $popular_product->id }},'{{ $popular_product->name }}',{{ $popular_product->sale_price }},'M','{{$popular_product->image}}')"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        {{-- @livewire('frontend.repair-services-component') --}}
    </section>
    @livewire('frontend.popular-categories-component')
    {{-- @livewire('frontend.offer-component') --}}
    <section class="section-padding">
        @livewire('frontend.new-arrivals-component')
    </section>
    {{-- @livewire('frontend.featured-brands-component')     --}}
</div>
