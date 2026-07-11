<?php if($order): ?>
    <h1 style="text-align: center">ORDER INVOICE</h1>
    <table class="table" width="100%" border="1" cellpadding="6" cellspacing="0">
        <tr>
            <td colspan="2">Order ID #: <?php echo e($order->id); ?></td>
            <td colspan="2" class="text-end">
                Status: <?php echo App\Lib\Webspice::textStatus($order->status); ?>

                <?php if($order->status == 'delivered'): ?>
                    <br>
                    Delivered Date: <?php echo e($order->delivered_date); ?>

                <?php elseif($order->status == 'canceled'): ?>
                    <br>
                    Canceled Date: <?php echo e($order->canceled_date); ?>

                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td><?php echo e($order->first_name . ' ' . $order->last_name); ?></td>
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
    <table class="table"  width="100%" border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr style="background-color: #CCC">
                
                <th>Prouct Name</th>
                <th style="text-align:center">Quantity</th>
                <th style="text-align:center">Size</th>
                <th style="text-align:center">Color</th>
                <th style='text-align:right;font-weight:bold'>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                            //print_r($order->orderDetails);
                            foreach($order->orderDetails as $item):
                            ?>
            <tr>
                <td><?php echo e($item->product->name); ?></td>
                <td style="text-align:center"><?php echo e($item->quantity); ?></td>
                <td style="text-align:center"><?php echo e($item->size); ?></td>
                <td style="text-align:center"><?php echo e($item->color); ?></td>
                <td style='text-align:right'><?php echo e($item->price); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Subtotal</td>
                <td style='text-align:right;font-weight:bold'><?php echo e($order->subtotal); ?></td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Discount</td>
                <td style='text-align:right;font-weight:bold'><?php echo e($order->discount); ?></td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Tax</td>
                <td style='text-align:right;font-weight:bold'><?php echo e($order->tax); ?></td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Total</td>
                <td style='text-align:right;font-weight:bold'><?php echo e($order->total); ?></td>
            </tr>
        </tfoot>
    </table>
<?php endif; ?>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\backend\order\invoice.blade.php ENDPATH**/ ?>