<div>
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated"><?php echo e($slider->top_title); ?></h4>
                                <h2 class="animated fw-900"><?php echo e($slider->title); ?></h2>
                                <h1 class="animated fw-900 text-brand"><?php echo e($slider->sub_title); ?></h1>
                                <p class="animated"><?php echo e($slider->offer); ?></p>
                                <a class="animated btn btn-brush btn-brush-3" href="<?php echo e($slider->link); ?>"> Shop
                                    Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1"
                                    src="<?php echo e(asset('frontend-assets/imgs/sliders')); ?>/<?php echo e($slider->image); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/slider-component.blade.php ENDPATH**/ ?>