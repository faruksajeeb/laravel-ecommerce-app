<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="<?php echo e(route('cart')); ?>">
        <img alt="Surfside Media" src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-cart.svg')); ?>">
        <span class="pro-count blue"><?php echo e(Cart::instance('cart')->count()); ?></span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            <?php $__currentLoopData = Cart::instance('cart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="shopping-cart-img">
                        <a href="<?php echo e(route('product-details', ['productId' => $item->id])); ?>"><img alt="Surfside Media"
                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($item->options->image); ?>"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a
                                href="<?php echo e(route('product-details', ['productId' => $item->id])); ?>"><?php echo e(substr($item->name, 0, 20)); ?></a>
                        </h4>
                        <h4><span><?php echo e($item->qty); ?> × </span>$<?php echo e($item->price); ?></h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent='delete("<?php echo e($item->rowId); ?>")'><i
                                class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>$<?php echo e(Cart::instance('cart')->total()); ?></span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="<?php echo e(route('cart')); ?>" class="outline">View cart</a>
                <a href="#" wire:click.prevent='checkOut'>Checkout</a>
            </div>
        </div>
    </div>t
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/shopping-cart-icon.blade.php ENDPATH**/ ?>