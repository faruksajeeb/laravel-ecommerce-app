<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Fashion
                <span></span> Abstract Print Patchwork Dress
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    @php
                                        $images = explode(',', $product->images);
                                        
                                    @endphp
                                    <div class="product-image-slider">
                                        <!-- MAIN IMAGE VIEW-->
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend-assets/imgs/products') }}/{{ $product->image }}"
                                                alt="Gallery Image {{ $product->name }}">
                                        </figure>
                                        <!--  SLIDER IMAGE VIEW-->
                                        @foreach ($images as $image)
                                            @if ($image)
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset('frontend-assets/imgs/products') }}/{{ $image }}"
                                                        alt="Gallery Image {{ $product->name }}">
                                                </figure>
                                            @endif
                                        @endforeach


                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15" wire:ignore>
                                        <!-- MAIN IMAGE THUMBNAIL-->
                                        <div><img
                                                src="{{ asset('frontend-assets/imgs/products') }}/{{ $product->image }}"
                                                alt="Gallery Image {{ $product->name }}"></div>
                                        <!-- SLIDER IMAGE THUMBNAIL-->
                                        @foreach ($images as $image)
                                            @if ($image)
                                                <div><img
                                                        src="{{ asset('frontend-assets/imgs/products') }}/{{ $image }}"
                                                        alt="Gallery Image {{ $product->name }}"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img
                                                    src="{{ asset('frontend-assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li class="social-twitter"> <a href="#"><img
                                                    src="{{ asset('frontend-assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li class="social-instagram"><a href="#"><img
                                                    src="{{ asset('frontend-assets/imgs/theme/icons/icon-instagram.svg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li class="social-linkedin"><a href="#"><img
                                                    src="{{ asset('frontend-assets/imgs/theme/icons/icon-pinterest.svg') }}"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Brands: <a href="{{ route('shop') }}">Bootstrap</a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">৳ {{ $product->sale_price }}</span></ins>
                                            <ins><span class="old-price font-md ml-15">৳
                                                    {{ $product->regular_price }}</span></ins>
                                            <span class="save-price  font-md color3 ml-15">25% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $product->short_description }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year Brand
                                                Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy
                                            </li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <form wire:submit.prevent='store'>
                                        @csrf
                                        <input type="hidden" wire:model='product_id'>
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <input type="hidden" name="" id="product_color" wire:model='color'>
                                            <ul class="list-filter color-filter" wire:ignore>
                                                <li><a href="#" class="color" data-color="red"><span
                                                            class="product-color-red"></span></a></li>
                                                <li><a href="#" class="color" data-color="yellow"><span
                                                            class="product-color-yellow"></span></a></li>
                                                <li class="active"><a href="#" data-color="white"><span
                                                            class="product-color-white"></span></a></li>
                                                <li><a href="#" class="color" data-color="orange"><span
                                                            class="product-color-orange"></span></a></li>
                                                <li><a href="#" class="color" data-color="cyan"><span
                                                            class="product-color-cyan"></span></a></li>
                                                <li><a href="#" class="color" data-color="green"><span
                                                            class="product-color-green"></span></a></li>
                                                <li><a href="#" class="color" data-color="purple"><span
                                                            class="product-color-purple"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <input type="hidden" name="" id="product_size"
                                                wire:model='size'>
                                            <ul class="list-filter size-filter font-small" wire:ignore>
                                                <li><a href="#" class="size" data-size="XS">XS</a></li>
                                                <li><a href="#" class="size" data-size="S">S</a></li>
                                                <li class="active"><a href="#" class="size"
                                                        data-size="M">M</a></li>
                                                <li><a href="#" class="size" data-size="L">L</a></li>
                                                <li><a href="#" class="size" data-size="XL">XL</a></li>
                                                <li><a href="#" class="size" data-size="XXL">XXL</a></li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">

                                            <input type="hidden" name="" id="product_quantity"
                                                wire:model='quantity'>
                                            <div class="detail-qty border radius" wire:ignore>
                                                <a href="#" class="qty-down quantity"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up quantity"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"
                                                    {{-- wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }},'M','{{ $product->image }}')">Add --}}>Add
                                                    to
                                                    cart</button>
                                                @php
                                                    $wishItems = Cart::instance('wishlist')
                                                        ->content()
                                                        ->pluck('id');
                                                @endphp
                                                @if ($wishItems->contains($product->id))
                                                    <a aria-label="Remove from Wishlist"
                                                        class="action-btn hover-up wishlisted" href="#"
                                                        wire:click.prevent='removeFromWishList({{ $product->id }})'><i
                                                            class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        wire:click.prevent='addToWishList({{ $product->id }},"{{ $product->name }}",{{ $product->sale_price }},"M","{{ $product->image }}")'><i
                                                            class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>

                                        </div>
                                    </form>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#">{{ $product->SKU }}</a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a
                                                href="#" rel="tag">Women</a>, <a href="#"
                                                rel="tag">Dress</a> </li>
                                        <li>Availability:<span
                                                class="in-stock text-success ml-5">{{ $product->quantity }} Items In
                                                Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                        href="#Additional-info">Additional info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                        href="#Reviews">Reviews </a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{{ $product->short_description }}</p>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    {{ $product->description }}
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    @livewire('frontend.review', ['productId' => $productId])
                                </div>
                            </div>
                        </div>
                        @livewire('frontend.related-products-component', ['categoryId' => $product->category_id, 'productId' => $product->id])
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    {{-- @livewire('frontend.filter-by-category',['route'=>Route::currentRouteName()]) --}}
                    <!-- Fillter By Price -->
                    {{-- @livewire('frontend.filter-by-price') --}}
                    <!-- Product sidebar Widget -->
                    @livewire('frontend.new-products-component')
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.color').on('click', function(e) {
                var colorValue = $(this).attr("data-color");
                @this.set('color', colorValue);
                $('#product_color').val(colorValue);
            });
            $('.size').on('click', function(e) {
                var sizeValue = $(this).attr("data-size");
                @this.set('size', sizeValue);
                $('#product_size').val(sizeValue);
            });
            $('.quantity').on('click', function(e) {
                var qtyValue = $(".qty-val").text();
                @this.set('quantity', qtyValue);
                $('#product_quantity').val(qtyValue);
            });
        });
    </script>
@endpush
