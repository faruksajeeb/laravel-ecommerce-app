<div>
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
                </div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    <?php $__currentLoopData = $popular_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="<?php echo e(route('shop')); ?>"><img
                                        src="<?php echo e(asset('frontend-assets/imgs/categories')); ?>/<?php echo e($popular_category->image); ?>"
                                        alt=""></a>
                            </figure>
                            <h5><a href="<?php echo e(route('shop')); ?>"><?php echo e($popular_category->name); ?></a></h5>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/popular-categories-component.blade.php ENDPATH**/ ?>