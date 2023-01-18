<?php $__env->startPush('styles'); ?>
    <style>
        .product-cart-wrap .product-action-1 button:after,
        .product-cart-wrap .product-action-1 a.action-btn:after {
            left: -32%;
        }
    </style>
<?php $__env->stopPush(); ?>
<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row product-grid-3">
                <?php $__currentLoopData = Cart::instance('wishlist')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="<?php echo e(route('product-details', ['productId' => $item->model->id])); ?>">
                                        <img class="default-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($item->options->image); ?>"
                                            alt="">
                                        <img class="hover-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($item->options->image); ?>"
                                            alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal">
                                        <i class="fi-rs-search"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i
                                            class="fi-rs-heart"></i></a>
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
                                        href="<?php echo e(route('product-details', ['productId' => $item->model->id])); ?>"><?php echo e($item->model->name); ?></a>
                                </h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>৳ <?php echo e($item->model->sale_price); ?> </span>
                                    <span class="old-price">৳ <?php echo e($item->model->regular_price); ?></span>
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                        href="#" wire:click.prevent='removeFromWishList(<?php echo e($item->model->id); ?>)'><i
                                            class="fi-rs-trash"></i></a>
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                            wire:click.prevent="moveProductToCart('<?php echo e($item->rowId); ?>')"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/wishlist-component.blade.php ENDPATH**/ ?>