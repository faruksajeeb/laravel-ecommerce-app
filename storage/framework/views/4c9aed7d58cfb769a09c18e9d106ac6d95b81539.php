<div class="container my-3">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Your Orders</h5>
        </div>
        <div class="card-body">
            
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Order</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $my_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center">#<?php echo e($my_order->id); ?></td>
                                <td class="text-center"><?php echo e($my_order->created_at); ?></td>
                                <td class="text-center"><?php echo App\Lib\Webspice::textStatus($my_order->status); ?></td>
                                <td class="text-center"><?php echo e($my_order->total); ?> for <?php echo e($my_order->quantity); ?> item</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm bg-info"   data-bs-toggle="modal" data-bs-target="#detailModal" wire:click.prevent='viewOrder(<?php echo e($my_order->id); ?>)'>View</a>
                                <?php if($my_order->status=='ordered'): ?>
                                <a href="#" class="btn btn-sm btn-danger"   wire:click.prevent='cancelOrder(<?php echo e($my_order->id); ?>)'>Cancel</a>
                               
                                <?php endif; ?>
                            </td>
                                    
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo e($my_orders->links()); ?>

                    </div>
                    <div class="col-md-6 text-end">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                <?php echo __('Showing'); ?>

                                <span class="font-medium"><?php echo e($my_orders->firstItem()); ?></span>
                                <?php echo __('to'); ?>

                                <span class="font-medium"><?php echo e($my_orders->lastItem()); ?></span>
                                <?php echo __('of'); ?>

                                <span class="font-medium"><?php echo e($my_orders->total()); ?></span>
                                <?php echo __('results'); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.my-order-detail-component')->html();
} elseif ($_instance->childHasBeenRendered('l3513530364-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3513530364-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3513530364-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3513530364-0');
} else {
    $response = \Livewire\Livewire::mount('frontend.my-order-detail-component');
    $html = $response->html();
    $_instance->logRenderedChild('l3513530364-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/my-order-component.blade.php ENDPATH**/ ?>