@if ($order)
    <h1 style="text-align: center">ORDER INVOICE</h1>
    <table class="table" width="100%" border="1" cellpadding="6" cellspacing="0">
        <tr>
            <td colspan="2">Order ID #: {{ $order->id }}</td>
            <td colspan="2" class="text-end">
                Status: {!! App\Lib\Webspice::textStatus($order->status) !!}
                @if ($order->status == 'delivered')
                    <br>
                    Delivered Date: {{ $order->delivered_date }}
                @elseif ($order->status == 'canceled')
                    <br>
                    Canceled Date: {{ $order->canceled_date }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
            <td>Mobile</td>
            <td>{{ $order->mobile }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $order->email }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Address 1</td>
            <td>{{ $order->line1 }}</td>
            <td>Address 2</td>
            <td>{{ $order->line2 }}</td>
        </tr>
    </table>
    <table class="table"  width="100%" border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr style="background-color: #CCC">
                {{-- <th>ID</th> --}}
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
                <td>{{ $item->product->name }}</td>
                <td style="text-align:center">{{ $item->quantity }}</td>
                <td style="text-align:center">{{ $item->size }}</td>
                <td style="text-align:center">{{ $item->color }}</td>
                <td style='text-align:right'>{{ $item->price }}</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Subtotal</td>
                <td style='text-align:right;font-weight:bold'>{{ $order->subtotal }}</td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Discount</td>
                <td style='text-align:right;font-weight:bold'>{{ $order->discount }}</td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Tax</td>
                <td style='text-align:right;font-weight:bold'>{{ $order->tax }}</td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td style='text-align:right;font-weight:bold'>Total</td>
                <td style='text-align:right;font-weight:bold'>{{ $order->total }}</td>
            </tr>
        </tfoot>
    </table>
@endif
