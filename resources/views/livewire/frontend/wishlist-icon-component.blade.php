<div class="header-action-icon-2">
    <a href="{{route('wishlist')}}">
        <img class="svgInject" alt="wishlist"
            src="{{ asset('frontend-assets/imgs/theme/icons/icon-heart.svg') }}">
        <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
    </a>
</div>
