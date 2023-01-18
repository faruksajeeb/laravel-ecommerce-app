<div>
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">New products</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        @foreach ($new_products as $new_product)
            <div class="single-post clearfix">
                <div class="image">
                    <img src="{{ asset('frontend-assets/imgs/products') }}/{{ $new_product->image }}"
                        alt="{{ $new_product->name }}">
                </div>
                <div class="content pt-10">
                    <h5><a href="{{ route('product-details', ['productId' => $new_product->id]) }}">{{ $new_product->name }}</a></h5>
                    <p class="price mb-0 mt-5">৳ {{ $new_product->sale_price }}</p>
                    <div class="product-rate">
                        <div class="product-rating" style="width:90%"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
