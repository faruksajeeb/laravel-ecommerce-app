<header class="header-area header-style-1 header-height-2">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.header-top-component')->html();
} elseif ($_instance->childHasBeenRendered('Wqii7TP')) {
    $componentId = $_instance->getRenderedChildComponentId('Wqii7TP');
    $componentTag = $_instance->getRenderedChildComponentTagName('Wqii7TP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Wqii7TP');
} else {
    $response = \Livewire\Livewire::mount('frontend.header-top-component');
    $html = $response->html();
    $_instance->logRenderedChild('Wqii7TP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    
                    <a href="<?php echo e(route('/')); ?>"><img src="<?php echo e(asset('frontend-assets/imgs/logo/logo.png')); ?>" alt="logo"></a>
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
} elseif ($_instance->childHasBeenRendered('Ek2rERS')) {
    $componentId = $_instance->getRenderedChildComponentId('Ek2rERS');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ek2rERS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ek2rERS');
} else {
    $response = \Livewire\Livewire::mount('frontend.header-search-component');
    $html = $response->html();
    $_instance->logRenderedChild('Ek2rERS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.wishlist-icon-component')->html();
} elseif ($_instance->childHasBeenRendered('JRhS3Df')) {
    $componentId = $_instance->getRenderedChildComponentId('JRhS3Df');
    $componentTag = $_instance->getRenderedChildComponentTagName('JRhS3Df');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JRhS3Df');
} else {
    $response = \Livewire\Livewire::mount('frontend.wishlist-icon-component');
    $html = $response->html();
    $_instance->logRenderedChild('JRhS3Df', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.compare-icon-component')->html();
} elseif ($_instance->childHasBeenRendered('HYoOjBo')) {
    $componentId = $_instance->getRenderedChildComponentId('HYoOjBo');
    $componentTag = $_instance->getRenderedChildComponentTagName('HYoOjBo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HYoOjBo');
} else {
    $response = \Livewire\Livewire::mount('frontend.compare-icon-component');
    $html = $response->html();
    $_instance->logRenderedChild('HYoOjBo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.shopping-cart-icon')->html();
} elseif ($_instance->childHasBeenRendered('1X5Nyhv')) {
    $componentId = $_instance->getRenderedChildComponentId('1X5Nyhv');
    $componentTag = $_instance->getRenderedChildComponentTagName('1X5Nyhv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1X5Nyhv');
} else {
    $response = \Livewire\Livewire::mount('frontend.shopping-cart-icon');
    $html = $response->html();
    $_instance->logRenderedChild('1X5Nyhv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('MKJnG31')) {
    $componentId = $_instance->getRenderedChildComponentId('MKJnG31');
    $componentTag = $_instance->getRenderedChildComponentTagName('MKJnG31');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MKJnG31');
} else {
    $response = \Livewire\Livewire::mount('frontend.browse-categories-component');
    $html = $response->html();
    $_instance->logRenderedChild('MKJnG31', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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