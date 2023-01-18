<div>
    <span><?php echo e(Auth::guard('customer')->user()->name); ?></span>
    <a class="" href="#" wire:click.prevent='customerLogout'>
    <?php echo e(__('Logout')); ?>

</a>

</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/customer-logout.blade.php ENDPATH**/ ?>