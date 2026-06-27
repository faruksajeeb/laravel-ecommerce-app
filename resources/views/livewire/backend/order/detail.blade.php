<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                @csrf
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
                    @if ($order)
                   <table class="table">
                        <tr>
                            <td colspan="2">Order ID #: {{ $order->id }}</td>
                            <td colspan="2" class="text-end">
                                Status: {!! App\Lib\Webspice::textStatus($order->status) !!}
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
                            <td>{{ $order->first_name.' '.$order->last_name}}</td>
                            <td>Mobile</td>
                            <td>{{ $order->mobile}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$order->email}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Address 1</td>
                            <td>{{$order->line1}}</td>
                            <td>Address 2</td>
                            <td>{{$order->line2}}</td>
                        </tr>
                   </table>
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
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
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->color }}</td>                                
                                <td>{{ $item->price }}</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='3'></td>
                                <td>Subtotal</td>
                                <td>{{$order->subtotal}}</td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Discount</td>
                                <td>{{$order->discount}}</td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Tax</td>
                                <td>{{$order->tax}}</td>
                            </tr>
                            <tr>
                                <td colspan='3'></td>
                                <td>Total</td>
                                <td>{{$order->total}}</td>
                            </tr>
                        </tfoot>
                    </table>
                         
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent='resetInput'><i class="fa fa-remove"></i> Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
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
@endpush
