<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('cart') }}">
        <img alt="Surfside Media" src="{{ asset('frontend-assets/imgs/theme/icons/icon-cart.svg') }}">
        <span class="pro-count blue">{{ Cart::instance('cart')->count() }}</span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach (Cart::instance('cart')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{ route('product-details', ['productId' => $item->id]) }}"><img alt="Surfside Media"
                                src="{{ asset('frontend-assets/imgs/products') }}/{{ $item->options->image }}"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a
                                href="{{ route('product-details', ['productId' => $item->id]) }}">{{ substr($item->name, 0, 20) }}</a>
                        </h4>
                        <h4><span>{{ $item->qty }} × </span>${{ $item->price }}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent='delete("{{ $item->rowId }}")'><i
                                class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>${{ Cart::instance('cart')->total() }}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('cart') }}" class="outline">View cart</a>
                <a href="{{ route('checkout') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>
