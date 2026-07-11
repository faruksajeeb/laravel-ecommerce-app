<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('/') }}" rel="nofollow">Home</a>
                <span></span> Compare Products
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-30">Compare Products</h3>
                    @if (Cart::instance('compare')->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered compare-table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="align-middle">Feature</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            @php
                                                $compareImage = $item->options->image;
                                                if (empty($compareImage) || $compareImage == '[]' || !file_exists(public_path('frontend-assets/imgs/products/' . $compareImage))) {
                                                    $compareImage = 'product-image-avatar.png';
                                                }
                                            @endphp
                                            <th scope="col" class="align-middle product-col">
                                                <a href="#" class="text-danger"
                                                    wire:click.prevent="removeFromCompare({{ $item->id }})"
                                                    aria-label="Remove">
                                                    <i class="fi-rs-cross-small"></i>
                                                </a>
                                                <a
                                                    href="{{ route('product-details', ['productId' => $item->model->id]) }}">
                                                    <img class="img-fluid mb-10"
                                                        src="{{ asset('frontend-assets/imgs/products') }}/{{ $compareImage }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                                <h6 class="mb-0">
                                                    <a
                                                        href="{{ route('product-details', ['productId' => $item->model->id]) }}">{{ $item->name }}</a>
                                                </h6>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Price</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td>
                                                <span class="text-brand fw-bold">৳ {{ $item->price }}</span>
                                                @if ($item->model->regular_price > $item->price)
                                                    <span
                                                        class="old-price font-md ml-10">৳ {{ $item->model->regular_price }}</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">SKU</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td>{{ $item->model->SKU ?? 'N/A' }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td>{{ $item->model->category->name ?? 'N/A' }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">Availability</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td>
                                                @if ($item->model->stock_status == 'instock')
                                                    <span class="text-success">In Stock</span>
                                                @else
                                                    <span class="text-danger">Out of Stock</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">Short Description</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td class="text-start">{{ \Illuminate\Support\Str::limit($item->model->short_description, 120) }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">Action</th>
                                        @foreach (Cart::instance('compare')->content() as $item)
                                            <td>
                                                <button type="button" class="btn btn-sm btn-brand btn-block mb-10"
                                                    wire:click.prevent="moveProductToCart('{{ $item->rowId }}')">
                                                    Add to Cart
                                                </button>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-20">
                            <button type="button" class="btn btn-brand btn-sm"
                                wire:click.prevent="clearCompare">Clear All</button>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            You have no products to compare.
                            <a href="{{ route('shop') }}" class="alert-link">Continue shopping</a>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
    <style>
        .compare-table th,
        .compare-table td {
            vertical-align: middle;
            min-width: 180px;
        }

        .compare-table .product-col {
            min-width: 200px;
        }
    </style>
@endpush
