<div>
    <span><?php echo e(Auth::guard('customer')->user()->name); ?></span>
    <a class="" href="#" wire:click.prevent='customerLogout'>
    <?php echo e(__('Logout')); ?>

</a>

</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/customer-logout.blade.php ENDPATH**/ ?>