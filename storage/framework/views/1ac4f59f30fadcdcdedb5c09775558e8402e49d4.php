<div>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                </div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="<?php echo e(route('product-details', ['productId' => $latest_product->id])); ?>">
                                        <img class="default-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($latest_product->image); ?>"
                                            alt="<?php echo e($latest_product->name); ?>">
                                        <img class="hover-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($latest_product->image); ?>"
                                            alt="<?php echo e($latest_product->name); ?>">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                        href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                        tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="<?php echo e(route('product-details', ['productId' => $latest_product->id])); ?>"><?php echo e($latest_product->name); ?></a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>???<?php echo e($latest_product->sale_price); ?> </span>
                                    <span class="old-price">???<?php echo e($latest_product->regular_price); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/new-arrivals-component.blade.php ENDPATH**/ ?>