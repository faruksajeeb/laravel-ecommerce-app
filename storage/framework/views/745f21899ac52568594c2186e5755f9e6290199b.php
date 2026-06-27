<?php $__env->startPush('styles'); ?>
<style>
.wishlisted{
    background-color: #F15412 !important;
    border: 1px solid transparent !important; 
}
.wishlisted i{
    color:#fff !important;
}
</style>
    
<?php $__env->stopPush(); ?>
<div>
    <div class="row mt-60">
        <div class="col-12">
            <h3 class="section-title style-1 mb-30">Related products</h3>
        </div>
        <div class="col-12">
            <div class="row related-products">
                <?php
                $wishItems = Cart::instance('wishlist')
                    ->content()
                    ->pluck('id');
            ?>
                <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    :
                    <?php
                        $featureImage = $related_product->image ?: 'product-image-avatar.png';
                    ?>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="<?php echo e(route('product-details', ['productId' => $related_product->id])); ?>"
                                        tabindex="0">
                                        <img class="default-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($featureImage); ?>"
                                            alt="">
                                        <img class="hover-img"
                                            src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($featureImage); ?>"
                                            alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                        <?php if($wishItems->contains($related_product->id)): ?>
                                        <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                            href="#"
                                            wire:click.prevent='removeFromWishList(<?php echo e($related_product->id); ?>)'><i
                                                class="fi-rs-heart"></i></a>
                                    <?php else: ?>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" 
                                            wire:click.prevent='addToWishList(<?php echo e($related_product->id); ?>,"<?php echo e($related_product->name); ?>",<?php echo e($related_product->sale_price); ?>,"M","<?php echo e($related_product->image); ?>")'><i
                                                class="fi-rs-heart"></i></a>
                                    <?php endif; ?>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="#"
                                        tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot"><?php echo e($related_product->category->name?? 'Hot'); ?></span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="<?php echo e(route('product-details', ['productId' => $related_product->id])); ?>"
                                        tabindex="0"><?php echo e($related_product->name); ?></a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>৳ <?php echo e($related_product->sale_price); ?> </span>
                                    <span class="old-price">৳
                                        <?php echo e($related_product->regular_price); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>    
</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/related-products-component.blade.php ENDPATH**/ ?>