<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.slider-component')->html();
} elseif ($_instance->childHasBeenRendered('l4176005109-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4176005109-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4176005109-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4176005109-0');
} else {
    $response = \Livewire\Livewire::mount('frontend.slider-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4176005109-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-1.png')); ?>" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-2.png')); ?>" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-3.png')); ?>" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-4.png')); ?>" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-5.png')); ?>" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/feature-6.png')); ?>" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        <?php $__currentLoopData = $feature_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="<?php echo e(route('product-details', ['productId' => $feature_product->id])); ?>">
                                            <img class="default-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($feature_product->image); ?>"
                                                alt="<?php echo e($feature_product->name); ?>">
                                            <img class="hover-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($feature_product->image); ?>"
                                                alt="<?php echo e($feature_product->name); ?>">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Clothing</a>
                                    </div>
                                    <h2><a href="<?php echo e(route('product-details', ['productId' => $feature_product->id])); ?>">Colorful Pattern Shirts</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>৳ <?php echo e($feature_product->sale_price); ?> </span>
                                        <span class="old-price">৳ <?php echo e($feature_product->regular_price); ?></span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store(<?php echo e($feature_product->id); ?>,'<?php echo e($feature_product->name); ?>',<?php echo e($feature_product->sale_price); ?>,'M','<?php echo e($feature_product->image); ?>')"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="<?php echo e(route('product-details', ['productId' => $new_product->id])); ?>">
                                            <img class="default-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($new_product->image); ?>"
                                                alt="">
                                            <img class="hover-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($new_product->image); ?>"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Donec </a>
                                    </div>
                                    <h2><a href="<?php echo e(route('product-details', ['productId' => $new_product->id])); ?>"><?php echo e($new_product->name); ?></a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>৳ <?php echo e($new_product->sale_price); ?> </span>
                                        <span class="old-price">৳ <?php echo e($new_product->regular_price); ?></span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="#"  wire:click.prevent="store(<?php echo e($new_product->id); ?>,'<?php echo e($new_product->name); ?>',<?php echo e($new_product->sale_price); ?>,'M')"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        <?php $__currentLoopData = $popular_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="<?php echo e(route('product-details', ['productId' => $popular_product->id])); ?>">
                                            <img class="default-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($popular_product->image); ?>"
                                                alt="">
                                            <img class="hover-img"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($popular_product->image); ?>"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="#"><i
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
                                    <h2><a href="<?php echo e(route('product-details', ['productId' => $popular_product->id])); ?>">Donec ut nisl rutrum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>৳ <?php echo e($popular_product->sale_price); ?> </span>
                                        <span class="old-price">৳ <?php echo e($popular_product->regular_price); ?></span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="#"   wire:click.prevent="store(<?php echo e($popular_product->id); ?>,'<?php echo e($popular_product->name); ?>',<?php echo e($popular_product->sale_price); ?>,'M')"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="<?php echo e(asset('frontend-assets/imgs/banner/banner-4.png')); ?>" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>       
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.popular-categories-component')->html();
} elseif ($_instance->childHasBeenRendered('l4176005109-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l4176005109-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4176005109-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4176005109-1');
} else {
    $response = \Livewire\Livewire::mount('frontend.popular-categories-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4176005109-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.offer-component')->html();
} elseif ($_instance->childHasBeenRendered('l4176005109-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l4176005109-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4176005109-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4176005109-2');
} else {
    $response = \Livewire\Livewire::mount('frontend.offer-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4176005109-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.new-arrivals-component')->html();
} elseif ($_instance->childHasBeenRendered('l4176005109-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l4176005109-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4176005109-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4176005109-3');
} else {
    $response = \Livewire\Livewire::mount('frontend.new-arrivals-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4176005109-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.featured-brands-component')->html();
} elseif ($_instance->childHasBeenRendered('l4176005109-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l4176005109-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4176005109-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4176005109-4');
} else {
    $response = \Livewire\Livewire::mount('frontend.featured-brands-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4176005109-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/home.blade.php ENDPATH**/ ?>