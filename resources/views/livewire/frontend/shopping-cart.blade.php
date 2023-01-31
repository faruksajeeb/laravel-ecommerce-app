    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if (Session::has('success-message'))
                                <div class="alert alert-success">
                                    <strong>Success, </strong>{{ Session::get('success-message') }}
                                </div>
                            @endif
                            @if (Cart::instance('cart')->count() > 0):
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">colr</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Tax</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach (Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('frontend-assets/imgs/products') }}/{{ $item->options->image }}"
                                                        alt="{{ $item->options->image}}"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="{{route('product-details',['productId'=>$item->id])}}">{{ $item->name }}</a></h5>
                                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                        magndapibus.
                                                    </p> --}}
                                                </td>
                                                <td class="price" data-title="Price"><span>৳ {{ $item->price }}
                                                    </span>
                                                </td>
                                                <td class="size" data-title="size"><span><?php echo $item->options->has('size') ? $item->options->size : 'M'; ?> </span>
                                                </td>
                                                <td class="color" data-title="color"><span><?php echo $item->options->has('color') ? $item->options->color : 'white'; ?> </span>
                                                </td>

                                                <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <a href="#"
                                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"
                                                            class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">{{ $item->qty }}</span>
                                                        <a href="#"
                                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"
                                                            class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>৳ {{ $item->tax }} </span>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>৳ {{ $item->total }} </span>
                                                </td>
                                                <td class="action" data-title="Remove"><a href="#"
                                                        wire:click.prevent="delete('{{ $item->rowId }}')"
                                                        class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="8" class="text-end">
                                                <a href="#" wire:click.prevent='destroy()' class="text-muted"> <i
                                                        class="fi-rs-cross-small"></i>
                                                    Clear
                                                    Cart</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">

                                    <h2 class="text-center">No item in cart.</h2>
                                    <br>
                                    <a class="btn float-center text-center" href="{{ route('shop') }}"><i
                                            class="fi-rs-shopping-bag mr-10"></i>Add Item</a>
                                </div>
                            @endif
                        </div>

                        @if (Cart::instance('cart')->count() > 0):
                            <div class="cart-action text-end">
                                {{-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a> --}}
                                <a class="btn " href="{{ route('shop') }}"><i
                                        class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                            </div>
                            <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                            <div class="row mb-50">
                                <div class="col-lg-6 col-md-12">

                                    {{-- @livewire('frontend.shipping-calculator') --}}

                                    <div class="mb-30 mt-50">
                                        @php
                                            // dd(session()->get('coupon'));
                                        @endphp
                                        @if (!Session::has('coupon'))
                                            <div class="heading_s1 mb-3">
                                                <h4>Apply Coupon</h4>
                                            </div>
                                            <div class="total-amount">
                                                <div class="left">

                                                    <div class="coupon">
                                                        <form action="#" wire:submit.prevent='applyCouponCode'>
                                                            <div class="form-row row justify-content-center">
                                                                <div class="form-group col-lg-6">
                                                                    <input class="font-medium" name="couponCode"
                                                                        wire:model='couponCode'
                                                                        placeholder="Enter Your couponCode">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <button type="submit" class="btn  btn-sm"><i
                                                                            class="fi-rs-label mr-10"></i>Apply</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="border p-md-4 p-30 border-radius cart-totals">
                                        <div class="heading_s1 mb-3">
                                            <h4>Cart Totals</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Cart Subtotal</td>
                                                        <td class="cart_total_amount"><span
                                                                class="font-lg fw-900 text-brand">৳
                                                                {{ Cart::instance('cart')->subtotal() }}</span>
                                                        </td>
                                                    </tr>
                                                    @if (Session::has('coupon'))
                                                        <tr>
                                                            <td class="cart_total_label">Discount
                                                                ({{ Session::get('coupon')['code'] }}) <a
                                                                    href="#" wire:click.prevent='removeCoupon'
                                                                    class=""><i
                                                                        class="fi-rs-cross-small"></i></a></td>
                                                            <td class="cart_total_amount"> <i
                                                                    class="ti-gift mr-5"></i>৳
                                                                {{ $discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Tax
                                                                ({{ config('cart.tax') }}%)
                                                            </td>
                                                            <td class="cart_total_amount"> <i
                                                                    class="ti-gift mr-5"></i>৳
                                                                {{ $taxAfterDiscount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Subtotal With Discount</td>
                                                            <td class="cart_total_amount"> <i
                                                                    class="ti-gift mr-5"></i>৳
                                                                {{ $subtotalAfterDiscount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span
                                                                        class="font-xl fw-900 text-brand">৳
                                                                        {{ $totalAfterDiscount }}</span></strong>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="cart_total_label">Tax</td>
                                                            <td class="cart_total_amount"> <i
                                                                    class="ti-gift mr-5"></i>৳
                                                                {{ Cart::instance('cart')->tax() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Shipping</td>
                                                            <td class="cart_total_amount"> <i
                                                                    class="ti-gift mr-5"></i>
                                                                Free
                                                                Shipping</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span
                                                                        class="font-xl fw-900 text-brand">৳
                                                                        {{ Cart::instance('cart')->total() }}</span></strong>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="#" wire:click.prevent='checkOut' class="btn "> <i
                                                class="fi-rs-box-alt mr-10"></i> Proceed
                                            To CheckOut</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
