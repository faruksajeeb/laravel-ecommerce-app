<header class="header-area header-style-1 header-height-2">
    
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
    <a href="<?php echo e(route('/')); ?>" class="text-decoration-none d-inline-flex align-items-center text-nowrap tracking-tight group-logo">
        
        <span class="fs-3 fw-black text-pink-custom font-brand">
            Girl's<span class="text-dark position-relative ms-1 d-inline-block">Eye<span class="position-absolute start-50 translate-middle-x bottom-0 bg-dark rounded-circle" style="width: 4px; height: 4px; margin-bottom: -2px;"></span></span>
        </span>

        <div class="eye-icon-wrapper ms-2 d-inline-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 32px; height: 32px; flex-shrink: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-dark" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
        </div>
    </a>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@900&display=swap');
    
    .font-brand {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        letter-spacing: -0.04em !important;
    }
    .text-pink-custom {
        color: #db2777 !important;
    }
    .fw-black {
        font-weight: 900 !important;
    }
    .group-logo:hover .eye-icon-wrapper {
        background-color: #fce7f3 !important;
        transform: scale(1.05);
        transition: all 0.2s ease;
    }
</style>
                <div class="header-right">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.header-search-component')->html();
} elseif ($_instance->childHasBeenRendered('Nhzqs1n')) {
    $componentId = $_instance->getRenderedChildComponentId('Nhzqs1n');
    $componentTag = $_instance->getRenderedChildComponentTagName('Nhzqs1n');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Nhzqs1n');
} else {
    $response = \Livewire\Livewire::mount('frontend.header-search-component');
    $html = $response->html();
    $_instance->logRenderedChild('Nhzqs1n', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.wishlist-icon-component')->html();
} elseif ($_instance->childHasBeenRendered('b2Iyov8')) {
    $componentId = $_instance->getRenderedChildComponentId('b2Iyov8');
    $componentTag = $_instance->getRenderedChildComponentTagName('b2Iyov8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('b2Iyov8');
} else {
    $response = \Livewire\Livewire::mount('frontend.wishlist-icon-component');
    $html = $response->html();
    $_instance->logRenderedChild('b2Iyov8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.shopping-cart-icon')->html();
} elseif ($_instance->childHasBeenRendered('FlxIFNO')) {
    $componentId = $_instance->getRenderedChildComponentId('FlxIFNO');
    $componentTag = $_instance->getRenderedChildComponentTagName('FlxIFNO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FlxIFNO');
} else {
    $response = \Livewire\Livewire::mount('frontend.shopping-cart-icon');
    $html = $response->html();
    $_instance->logRenderedChild('FlxIFNO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="<?php echo e(route('/')); ?>"><img src="<?php echo e(asset('frontend-assets/imgs/logo/logo.png')); ?>"
                            alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.browse-categories-component')->html();
} elseif ($_instance->childHasBeenRendered('C5W0wSI')) {
    $componentId = $_instance->getRenderedChildComponentId('C5W0wSI');
    $componentTag = $_instance->getRenderedChildComponentTagName('C5W0wSI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('C5W0wSI');
} else {
    $response = \Livewire\Livewire::mount('frontend.browse-categories-component');
    $html = $response->html();
    $_instance->logRenderedChild('C5W0wSI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="<?php echo e(route('/')); ?>">
                                        
                                        Home </a></li>
                                <li><a href="<?php echo e(route('about')); ?>">About</a></li>
                                <li><a href="<?php echo e(route('shop')); ?>">Shop</a></li>
                                

                                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                <?php if(Auth::guard('customer')->check()): ?>
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            
                                            
                                            <li><a href="<?php echo e(route('my-orders')); ?>">My Orders</a></li>
                                            
                                            
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span></span> (+88) 01733-811-596 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                </p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media"
                                    src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-heart.svg')); ?>">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media"
                                    src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-cart.svg')); ?>">
                                <span class="pro-count white"><?php echo e(Cart::count()); ?></span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="<?php echo e(asset('frontend-assets/imgs/shop/thumbnail-3.jpg')); ?>"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="<?php echo e(asset('frontend-assets/imgs/shop/thumbnail-4.jpg')); ?>"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="<?php echo e(route('cart')); ?>">View cart</a>
                                        <a href="<?php echo e(route('checkout')); ?>">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/header.blade.php ENDPATH**/ ?>