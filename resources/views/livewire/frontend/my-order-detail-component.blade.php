<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-light py-3">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="exampleModalLabel">
                        <i class="fa-solid fa-magnifying-glass-plus text-primary"></i>
                        <span class="fw-semibold text-dark">Order Details</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent='resetInput'></button>
                </div>
                
                <div class="modal-body p-4">
                    <!-- Livewire Loading Indicator -->
                    <div wire:loading wire:target="orderDetail" class="position-absolute top-50 start-50 translate-middle z-3">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                    </div>

                    @if ($order)
                        <!-- Order Status & ID Header Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                                <div>
                                    <span class="text-muted small text-uppercase tracking-wider">Order Reference</span>
                                    <h5 class="mb-0 fw-bold text-dark">#{{ $order->id }}</h5>
                                </div>
                                <div class="text-sm-end">
                                    <span class="d-block mb-1">{!! App\Lib\Webspice::textStatus($order->status) !!}</span>
                                    @if ($order->status == 'delivered')
                                        <small class="text-muted d-block"><i class="fa-regular fa-calendar-check me-1"></i> Delivered: {{$order->delivered_date}}</small>
                                    @elseif ($order->status == 'canceled')
                                        <small class="text-danger d-block"><i class="fa-regular fa-calendar-times me-1"></i> Canceled: {{$order->canceled_date}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Customer & Shipping Information Grid -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100 bg-white">
                                    <h6 class="fw-bold text-muted text-uppercase small mb-3"><i class="fa-regular fa-user me-2 text-primary"></i>Customer Information</h6>
                                    <p class="mb-1 fw-semibold text-dark">{{ $order->first_name . ' ' . $order->last_name }}</p>
                                    <p class="mb-1 text-muted small"><i class="fa-solid fa-phone me-2 text-light-muted"></i>{{ $order->mobile }}</p>
                                    <p class="mb-0 text-muted small"><i class="fa-solid fa-envelope me-2 text-light-muted"></i>{{ $order->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100 bg-white">
                                    <h6 class="fw-bold text-muted text-uppercase small mb-3"><i class="fa-solid fa-truck me-2 text-primary"></i>Shipping Address</h6>
                                    <p class="mb-1 text-dark small fw-medium">{{ $order->line1 }}</p>
                                    @if($order->line2)
                                        <p class="mb-0 text-muted small">{{ $order->line2 }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Order Items Table -->
                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-box me-2 text-primary"></i>Items Ordered</h6>
                        <div class="table-responsive border rounded-3 mb-4">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-uppercase fs-7 tracking-wider">
                                    <tr>
                                        <th scope="col" class="ps-3" width="60">Product</th>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-center">Qty</th>
                                        <th scope="col">Specs</th>
                                        <th scope="col" class="text-end pe-3">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $item)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="{{ route('product-details', ['productId' => $item->product_id]) }}">
                                                    <img src="{{ asset('frontend-assets/imgs/products')}}/{{$item->product->image}}" class="img-thumbnail rounded" style="width: 45px; height: 45px; object-fit: cover;" alt="{{ $item->product->name }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('product-details', ['productId' => $item->product_id]) }}" class="text-decoration-none fw-medium text-dark d-block text-truncate" style="max-width: 220px;">
                                                    {{ $item->product->name }}
                                                </a>
                                                @if (($order->status=='delivered') && ($item->rstatus==0))
                                                    <a href="{{ route('order-item-review',['orderItemId'=>$item->id]) }}" class="btn btn-sm btn-outline-primary py-0 px-2 mt-1 fs-7">
                                                        Write Review
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center fw-semibold text-muted">{{ $item->quantity }}</td>
                                            <td>
                                                <div class="small text-muted">
                                                    @if($item->size)<span class="badge bg-light text-dark border me-1">Size: {{ $item->size }}</span>@endif
                                                    @if($item->color)<span class="badge bg-light text-dark border">Color: {{ $item->color }}</span>@endif
                                                </div>
                                            </td>
                                            <td class="text-end fw-bold text-dark pe-3">{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pricing Summary Breakdown -->
                        <div class="row justify-content-end">
                            <div class="col-md-5">
                                <div class="border rounded-3 p-3 bg-light-subtle">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small">Subtotal</span>
                                        <span class="fw-semibold text-dark">{{ $order->subtotal }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small">Discount</span>
                                        <span class="fw-semibold text-success">-{{ $order->discount }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small">Tax</span>
                                        <span class="fw-semibold text-dark">{{ $order->tax }}</span>
                                    </div>
                                    <hr class="my-2 border-dashed">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-dark">Total Amount</span>
                                        <span class="fw-bold text-primary fs-5">{{ $order->total }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary px-4 shadow-sm" data-bs-dismiss="modal" wire:click.prevent='resetInput'>
                        <i class="fa fa-remove me-1"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
           // Add scripts here if needed
        </script>
    @endpush
</div>