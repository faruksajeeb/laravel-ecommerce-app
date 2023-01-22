@push('styles')
<style>
.wishlisted{
    background-color: #F15412 !important;
    border: 1px solid transparent !important; 
}
.wishlisted i{
    color:#fff !important;
}
</style>
    
@endpush
<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    
                    @livewire('frontend.filter-by-category',['route'=>Route::currentRouteName()])
                    <!-- Fillter By Price -->                    
                    @livewire('frontend.filter-by-price')
                    <!-- Product sidebar Widget -->
                    @livewire('frontend.new-products-component')
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="{{ asset('frontend-assets/imgs/banner/banner-11.jpg') }}" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ $products->total() }}</strong> items for you!
                                {{ $categoryName ? 'from ' : '' }}<strong
                                    class="text-brand">{{ $categoryId ? $categoryName : '' }}</strong>
                                {{ $categoryName ? 'category ' : '' }}</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{ $pageSize }} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{ $pageSize == 12 ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changePageSize(12)'>12</a></li>
                                        <li><a class="{{ $pageSize == 24 ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changePageSize(24)'>24</a></li>
                                        <li><a class="{{ $pageSize == 32 ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changePageSize(32)'>32</a></li>
                                        <li><a class="{{ $pageSize == 48 ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changePageSize(48)'>48</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        {{-- <span> Featured <i class="fi-rs-angle-small-down"></i></span> --}}
                                        <span> {{ $orderBy }} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{ $orderBy == 'Default Sorting' ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changeOrderBy("Default Sorting")'>Default
                                                Sorting</a></li>
                                        <li><a class="{{ $orderBy == 'Price: Low to High' ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changeOrderBy("Price: Low to High")'>Price: Low to
                                                High</a></li>
                                        <li><a class="{{ $orderBy == 'Price: High to Low' ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changeOrderBy("Price: High to Low")'>Price: High to
                                                Low</a></li>
                                        <li><a class="{{ $orderBy == 'Release Date' ? 'active' : '' }}" href="#"
                                                wire:click.prevent='changeOrderBy("Release Date")'>Release Date</a></li>
                                        {{-- <li><a href="#">Avg. Rating</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @php
                            $wishItems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-details', ['productId' => $product->id]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('frontend-assets/imgs//products') }}/{{ $product->image }}"
                                                    alt="{{$product->name}}-product-front" >
                                                <img class="hover-img"
                                                    src="{{ asset('frontend-assets/imgs//products') }}/{{ $product->image }}"
                                                    alt="{{$product->name}}-product-back" >
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html">Music</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product-details', ['productId' => $product->id]) }}">{{ $product->name }}</a>
                                        </h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳ {{ $product->sale_price }} </span>
                                            <span class="old-price">৳ {{ $product->regular_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            @if($wishItems->contains($product->id))
                                                <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                                href="#" wire:click.prevent='removeFromWishList({{$product->id}})'><i class="fi-rs-heart"></i></a>
                                            @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="#" wire:click.prevent='addToWishList({{$product->id}},"{{$product->name}}",{{$product->sale_price}},"M","{{ $product->image }}")'><i class="fi-rs-heart"></i></a>
                                            @endif
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }},'M','{{ $product->image }}')"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $products->links() }}
                        {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> --}}
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

