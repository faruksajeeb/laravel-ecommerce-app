<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-magnifying-glass-plus"></i> Order Detail
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  wire:click.prevent='resetInput'></button>
                </div>
                <div class="modal-body">
                    <div wire:loading wire:target="orderDetail">
                        <div class="spinner-border spinner-border-sm text-light" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                    </div>
                    <?php if($order): ?>
                   <table class="table">
                        <tr>
                            <td colspan="2">Order ID #: <?php echo e($order->id); ?></td>
                            <td colspan="2" class="text-end">
                                Status: <?php echo App\Lib\Webspice::textStatus($order->status); ?>

                                <?php if($order->status=='delivered'): ?>
                                    <br>
                                    Delivered Date: <?php echo e($order->delivered_date); ?>

                                <?php elseif($order->status=='canceled'): ?>
                                <br>
                                    Canceled Date: <?php echo e($order->canceled_date); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td><?php echo e($order->first_name.' '.$order->last_name); ?></td>
                            <td>Mobile</td>
                            <td><?php echo e($order->mobile); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e($order->email); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Address 1</td>
                            <td><?php echo e($order->line1); ?></td>
                            <td>Address 2</td>
                            <td><?php echo e($order->line2); ?></td>
                        </tr>
                   </table>
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Prouct Name</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Color</th>                                
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($order->orderDetails);
                            foreach($order->orderDetails as $item):
                            ?>
                            <tr>
                                <td><?php echo e($item->product->name); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td><?php echo e($item->size); ?></td>
                                <td><?php echo e($item->color); ?></td>                                
                                <td><?php echo e($item->price); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='3'></td>
                                <td>Subtotal</td>
                                <td><?php echo e($order->subtotal); ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Discount</td>
                                <td><?php echo e($order->discount); ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Tax</td>
                                <td><?php echo e($order->tax); ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Total</td>
                                <td><?php echo e($order->total); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                         
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent='resetInput'><i class="fa fa-remove"></i> Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#editModal').on('shown.bs.modal', function(e) {

            });
        });
        // product_image.onchange = evt => {
        //     const [file] = product_image.files
        //     if (file) {
        //         product_image_preview.src = URL.createObjectURL(file)
        //     }
        // }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/backend/order/detail.blade.php ENDPATH**/ ?>