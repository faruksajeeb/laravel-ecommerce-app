<div class="sidebar-widget price_range range mb-30">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">Filtered by price</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
    <div class="price-filter">
        <div class="price-filter-inner">
            <div id="slider-range" wire:ignore></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <span>Range:</span>
                    <span class="text-info">৳ <?php echo e($minPrice); ?></span> - <span
                        class="text-info">৳ <?php echo e($maxPrice); ?></span>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        
        $(function() {
           
            sliderrange.slider({
                range: true,
                min: 0,
                max: 10000,
                values: [0, 10000],
                slide: function(event, ui) {
                  
                    // amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    window.livewire.find('<?php echo e($_instance->id); ?>').set('minPrice',ui.values[0]);
                    window.livewire.find('<?php echo e($_instance->id); ?>').set('maxPrice',ui.values[1]);
                }
                //return false;
            });
            amountprice.val("৳ " + sliderrange.slider("values", 0) +
                " - ৳ " + sliderrange.slider("values", 1));
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/filter-by-price.blade.php ENDPATH**/ ?>