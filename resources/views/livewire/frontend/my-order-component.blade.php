<div class="container my-3">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Your Orders</h5>
        </div>
        <div class="card-body">
            {{-- <div class="table-responsive"> --}}
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
                        @foreach ($my_orders as $my_order)
                            <tr>
                                <td class="text-center">#{{ $my_order->id }}</td>
                                <td class="text-center">{{ $my_order->created_at }}</td>
                                <td class="text-center">{!! App\Lib\Webspice::textStatus($my_order->status) !!}</td>
                                <td class="text-center">{{ $my_order->total }} for {{ $my_order->quantity }} item</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm bg-info"   data-bs-toggle="modal" data-bs-target="#detailModal" wire:click.prevent='viewOrder({{$my_order->id}})'>View</a>
                                @if ($my_order->status=='ordered')
                                <a href="#" class="btn btn-sm btn-danger"   wire:click.prevent='cancelOrder({{$my_order->id}})'>Cancel</a>
                               
                                @endif
                            </td>
                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        {{ $my_orders->links() }}
                    </div>
                    <div class="col-md-6 text-end">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                {!! __('Showing') !!}
                                <span class="font-medium">{{ $my_orders->firstItem() }}</span>
                                {!! __('to') !!}
                                <span class="font-medium">{{ $my_orders->lastItem() }}</span>
                                {!! __('of') !!}
                                <span class="font-medium">{{ $my_orders->total() }}</span>
                                {!! __('results') !!}
                            </p>
                        </div>
                    </div>
                </div>
                @livewire('frontend.my-order-detail-component')
                
            </div>
        </div>
    </div>
</div>
