<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-magnifying-glass-plus"></i>
                            Order Detail
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click.prevent='resetInput'></button>
                    </div>
                    <div class="modal-body">
                        <div wire:loading wire:target="orderDetail">
                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                <span class="visually-hidden">Processing...</span>
                            </div>
                        </div>
                        @if ($order)
                            <table class="table">
                                <tr>
                                    <td colspan="2">Order ID #: {{ $order->id }}</td>
                                    <td colspan="2" class="text-end">Status: {!! App\Lib\Webspice::textStatus($order->status) !!}
                                        @if ($order->status=='delivered')
                                        <br>
                                        Delivered Date: {{$order->delivered_date}}
                                    @elseif ($order->status=='canceled')
                                    <br>
                                        Canceled Date: {{$order->canceled_date}}
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
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th  scope="col" >Image</th>
                                        <th  scope="col" >Prouct Name</th>
                                        <th  scope="col" >Quantity</th>
                                        <th  scope="col" >Size</th>
                                        <th  scope="col" >Color</th>
                                        <th  scope="col"  class='text-end fw-bold'>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        //print_r($order->orderDetails);
                        foreach($order->orderDetails as $item):
                        ?>
                                    <tr>
                                        <td  scope="row" width='30'><a href="{{ route('product-details', ['productId' => $item->product_id]) }}" ><img src="{{ asset('frontend-assets/imgs/products')}}/{{$item->product->image}}" width='30' height="30" alt=""></a></td>
                                        <td><a href="{{ route('product-details', ['productId' => $item->product_id]) }}" >{{ $item->product->name }}</a></td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td class='text-end fw-bold'>{{ $item->price }}</td>
                                        @if (($order->status=='delivered') && ($item->rstatus==0))
                                            <td><a href="{{ route('order-item-review',['orderItemId'=>$item->id]) }}" >Write Review</a></td>
                                        @endif
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td  scope="row" colspan='4'></td>
                                        <td class='fw-bold text-end'>Subtotal</td>
                                        <td class='text-end fw-bold'>{{ $order->subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td  scope="row" colspan='4'></td>
                                        <td class='fw-bold text-end'>Discount</td>
                                        <td class='text-end fw-bold'>{{ $order->discount }}</td>
                                    </tr>
                                    <tr>
                                        <td  scope="row" colspan='4'></td>
                                        <td class='fw-bold text-end'>Tax</td>
                                        <td class='text-end fw-bold'>{{ $order->tax }}</td>
                                    </tr>
                                    <tr>
                                        <td  scope="row" colspan='4'></td>
                                        <td class='fw-bold text-end'>Total</td>
                                        <td class='text-end fw-bold'>{{ $order->total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='resetInput'><i class="fa fa-remove"></i> Close</button>

                    </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
           
        </script>
    @endpush

</div>
