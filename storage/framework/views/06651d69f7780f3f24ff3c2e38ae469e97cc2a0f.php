<div>
    <?php $__env->startPush('styles'); ?>
        <style>
            .wishlisted {
                background-color: #F15412 !important;
                border: 1px solid transparent !important;
            }

            .wishlisted i {
                color: #fff !important;
            }

            .product-img.product-img-zoom img.default-img,
            .product-img.product-img-zoom img.hover-img {
                width: 100%;
                height: 260px;
                object-fit: cover;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.slider-component')->html();
} elseif ($_instance->childHasBeenRendered('l287133153-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l287133153-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l287133153-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l287133153-0');
} else {
    $response = \Livewire\Livewire::mount('frontend.slider-component');
    $html = $response->html();
    $_instance->logRenderedChild('l287133153-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    
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
                <!--En tab one (Featured)-->
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php
                            $wishItems = Cart::instance('wishlist')->content()->pluck('id');
                        ?>
                        <?php $__currentLoopData = $feature_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $featureImage = $feature_product->image ?: 'product-image-avatar.png';
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="<?php echo e(route('product-details', ['productId' => $feature_product->id])); ?>">
                                                <img class="default-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $featureImage)); ?>"
                                                    alt="<?php echo e($feature_product->name); ?>">
                                                <img class="hover-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $featureImage)); ?>"
                                                    alt="<?php echo e($feature_product->name); ?>">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <?php if($wishItems->contains($feature_product->id)): ?>
                                                <a aria-label="Remove from Wishlist"
                                                    class="action-btn hover-up wishlisted" href="#"
                                                    wire:click.prevent='removeFromWishList(<?php echo e($feature_product->id); ?>)'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php else: ?>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent='addToWishList(<?php echo e($feature_product->id); ?>,"<?php echo e($feature_product->name); ?>",<?php echo e($feature_product->sale_price); ?>,"M","<?php echo e($featureImage); ?>")'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php endif; ?>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Clothing</a>
                                        </div>
                                        <h2><a
                                                href="<?php echo e(route('product-details', ['productId' => $feature_product->id])); ?>">Colorful
                                                Pattern Shirts</a></h2>
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
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store(<?php echo e($feature_product->id); ?>,'<?php echo e($feature_product->name); ?>',<?php echo e($feature_product->sale_price); ?>,'M','<?php echo e($featureImage); ?>')"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab Two (Popular)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <?php $__currentLoopData = $popular_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $popularImage = $popular_product->image ?: 'product-image-avatar.png';
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="<?php echo e(route('product-details', ['productId' => $popular_product->id])); ?>">
                                                <img class="default-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $popularImage)); ?>"
                                                    alt="<?php echo e($popular_product->name); ?>">
                                                <img class="hover-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $popularImage)); ?>"
                                                    alt="<?php echo e($popular_product->name); ?>">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <?php if($wishItems->contains($popular_product->id)): ?>
                                                <a aria-label="Remove from Wishlist"
                                                    class="action-btn hover-up wishlisted" href="#"
                                                    wire:click.prevent='removeFromWishList(<?php echo e($popular_product->id); ?>)'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php else: ?>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent='addToWishList(<?php echo e($popular_product->id); ?>,"<?php echo e($popular_product->name); ?>",<?php echo e($popular_product->sale_price); ?>,"M","<?php echo e($popularImage); ?>")'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php endif; ?>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Music</a>
                                        </div>
                                        <h2><a
                                                href="<?php echo e(route('product-details', ['productId' => $popular_product->id])); ?>">Donec
                                                ut nisl rutrum</a></h2>
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
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store(<?php echo e($popular_product->id); ?>,'<?php echo e($popular_product->name); ?>',<?php echo e($popular_product->sale_price); ?>,'M','<?php echo e($popularImage); ?>')"><i
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
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">

                        <?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $newImage = $new_product->image ?: 'product-image-avatar.png';
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="<?php echo e(route('product-details', ['productId' => $new_product->id])); ?>">
                                                <img class="default-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $newImage)); ?>"
                                                    alt="<?php echo e($new_product->name); ?>">
                                                <img class="hover-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products/' . $newImage)); ?>"
                                                    alt="<?php echo e($new_product->name); ?>">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <?php if($wishItems->contains($new_product->id)): ?>
                                                <a aria-label="Remove from Wishlist"
                                                    class="action-btn hover-up wishlisted" href="#"
                                                    wire:click.prevent='removeFromWishList(<?php echo e($new_product->id); ?>)'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php else: ?>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent='addToWishList(<?php echo e($new_product->id); ?>,"<?php echo e($new_product->name); ?>",<?php echo e($new_product->sale_price); ?>,"M","<?php echo e($newImage); ?>")'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php endif; ?>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">Donec </a>
                                        </div>
                                        <h2><a
                                                href="<?php echo e(route('product-details', ['productId' => $new_product->id])); ?>"><?php echo e($new_product->name); ?></a>
                                        </h2>
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
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store(<?php echo e($new_product->id); ?>,'<?php echo e($new_product->name); ?>',<?php echo e($new_product->sale_price); ?>,'M','<?php echo e($newImage); ?>')"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--End product-grid-4-->
                </div>

            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        
    </section>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.popular-categories-component')->html();
} elseif ($_instance->childHasBeenRendered('l287133153-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l287133153-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l287133153-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l287133153-1');
} else {
    $response = \Livewire\Livewire::mount('frontend.popular-categories-component');
    $html = $response->html();
    $_instance->logRenderedChild('l287133153-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
    <section class="section-padding">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.new-arrivals-component')->html();
} elseif ($_instance->childHasBeenRendered('l287133153-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l287133153-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l287133153-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l287133153-2');
} else {
    $response = \Livewire\Livewire::mount('frontend.new-arrivals-component');
    $html = $response->html();
    $_instance->logRenderedChild('l287133153-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </section>
    
</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/home.blade.php ENDPATH**/ ?>