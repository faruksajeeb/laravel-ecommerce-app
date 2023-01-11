<div class="header-action-icon-2">
    <a href="<?php echo e(route('wishlist')); ?>">
        <img class="svgInject" alt="wishlist"
            src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-heart.svg')); ?>">
        <span class="pro-count blue"><?php echo e(Cart::instance('wishlist')->count()); ?></span>
    </a>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/wishlist-icon-component.blade.php ENDPATH**/ ?>