<div>
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">New products</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        <?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single-post clearfix">
                <div class="image">
                    <img src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($new_product->image); ?>"
                        alt="<?php echo e($new_product->name); ?>">
                </div>
                <div class="content pt-10">
                    <h5><a href="product-details.html"><?php echo e($new_product->name); ?></a></h5>
                    <p class="price mb-0 mt-5">৳ <?php echo e($new_product->sale_price); ?></p>
                    <div class="product-rate">
                        <div class="product-rating" style="width:90%"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/new-products-component.blade.php ENDPATH**/ ?>