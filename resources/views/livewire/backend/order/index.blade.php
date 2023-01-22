<x-slot name="title">
    Orders
</x-slot>

<div>
    <section>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-white my-0 pt-2 pb-0">
                        <div class="row ">
                            <div class="col-md-8">
                                <h4 class="card-title py-1"><i class="fa fa-list"></i> Orders</h4>
                                {{-- <nav aria-label="breadcrumb" class="float-start m-0 p-0">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                                        <li class="breadcrumb-item " aria-current="page">Categories</li>
                                    </ol>
                                </nav> --}}
                            </div>
                            <div class="col-md-4 col-sm-12 text-end">
                                {{-- @if ($loggedUser && $loggedUser->can('option_group.export')) --}}
                                <a class="btn btn-sm btn-success float-end" wire:click.prevent="render('excelExport')"><i
                                        class="fa-solid fa-download"></i> Export</a>
                                {{-- <a class="btn btn-sm btn-danger float-end mx-1" wire:click.prevent="render('pdfExport')"><i
                                        class="fa-solid fa-download"></i> PDF</a> --}}
                                {{-- @endif --}}
                                {{-- @if ($loggedUser && $loggedUser->can('option_group.create')) --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-outline-primary float-end me-1"
                                    data-bs-toggle="modal" data-bs-target="#addModal" wire:click="resetInputFields()">
                                    <i class="fa-solid fa-plus"></i> Create New
                                </button>
                                {{-- <a href="{{ route('users.create') }}" class="btn btn-xs btn-outline-primary float-end"
                                    name="create_new" type="button">
                                    <i class="fa-solid fa-plus"></i> Create New
                                </a> --}}
                                {{-- @endif --}}
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-1">
                        <div class="row my-1">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control border-end-0 border rounded-pill" type="text"
                                        placeholder="Search..." wire:model="searchTerm">
                                </div>
                                {{-- <span>{{ $searchTerm }}</span> --}}
                            </div>
                            <div class="col-md-2">
                                <select name="" id="" wire:model='status' class="form-control">
                                    <option value="">--Status--</option>
                                    <option value="ordered" >Ordered</option>
                                    <option value="processing">Processing</option>
                                    <option value="delivered" >Delivered</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div wire:ignore>
                                    <select name="search_customer_id" id="search_customer_id"
                                        wire:model='search_customer_id' class="form-control select2">
                                        <option value="">--Customer--</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <select name="" id="" wire:model='orderBy' class="form-control">
                                    <option value="">--Order By--</option>
                                    @foreach ($columns as $col)
                                        <option value="{{ $col }}">{{ $col }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="" id="" wire:model='sortBy' class="form-control">
                                    <option value="">--Sort By--</option>
                                    <option value="DESC">Decending</option>
                                    <option value="ASC">Ascending</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                Per Page
                                <select name="" id="" class="py-0" wire:model='pazeSize'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                </select>
                                Current Page {{ $orders->currentPage() }}
                            </div>
                        </div>

                        <table class="table table-striped table-brodered table-sm">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    {{-- <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th> --}}
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    {{-- <th>Updated At</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $val)
                                    <tr>
                                        <td>{{ $key + $orders->firstItem() }}</td>
                                        <td class="text-center">{{ $val->id }}</td>
                                        <td>{{ $val->first_name.' '.$val->last_name }}</td>
                                        <td>{{ $val->mobile }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->address }}</td>
                                        {{-- <td>{{ $val->subtotal }}</td>
                                        <td>{{ $val->discount }}</td>
                                        <td>{{ $val->tax }}</td> --}}
                                        <td>{{ $val->total }}</td>
                                        <td>
                                            {{-- <span class="badge bg-primary">{{ ucfirst($val->status) }}</span> --}}
                                            <select name="" id="" wire:change="changeStatus({{$val->id}},$event.target.value)">
                                                <option value="" >select</option>
                                                <option value="ordered" {{ ($val->status=='ordered')?'selected':''}}>Ordered</option>
                                                <option value="processing" {{ ($val->status=='processing') ?'selected':''}}>Processing</option>
                                                <option value="delivered" {{ ($val->status=='delivered') ?'selected':''}}>Delivered</option>
                                                <option value="canceled" {{ ($val->status=='canceled') ?'selected':''}}>Canceled</option>
                                            </select>
                                        </td>
                                        <td>{{ $val->created_at }}</td>
                                        {{-- <td>{{ $val->updated_at }}</td> --}}
                                        <td>
                                            <button class="btn btn-sm btn-secondary me-1 mt-1" data-bs-toggle="modal" data-bs-target="#detailModal" 
                                            wire:click.prevent="orderDetail('{{ Crypt::encryptString($val->id) }}')">
                                                <i class="fa-solid fa-magnifying-glass-plus"></i></button>                                            
                                            <button class="btn btn-sm btn-success me-1 py-1 mt-1 "
                                                wire:click.prevent="edit('{{ Crypt::encryptString($val->id) }}')"
                                                data-bs-toggle="modal" {{-- wire:click.prevent="edit({{ '553453453453454535SDD' }})" data-bs-toggle="modal" --}} {{-- wire:click.prevent="edit({{$val->id}})" data-bs-toggle="modal" --}}
                                                data-bs-target="#editModal" title="Edit"><i
                                                    class="fa-solid fa-file-pen"></i></button>

                                            <button class="btn btn-sm btn-danger py-1 mt-1 del_btn"
                                                {{-- wire:click.prevent="$emit('triggerDelete',{{ $val->id }})" --}}
                                                wire:click.prevent="$emit('triggerDelete','{{ Crypt::encryptString($val->id) }}')"
                                                {{-- wire:click.prevent="destroy('{{ Crypt::encryptString($val->id) }}')" --}} title="Delete"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer " wire:key="$orders->id">
                        <div class="row">
                            <div class="col-md-6">
                                {{ $orders->links() }}
                            </div>
                            <div class="col-md-6 text-end">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        {!! __('Showing') !!}
                                        <span class="font-medium">{{ $orders->firstItem() }}</span>
                                        {!! __('to') !!}
                                        <span class="font-medium">{{ $orders->lastItem() }}</span>
                                        {!! __('of') !!}
                                        <span class="font-medium">{{ $orders->total() }}</span>
                                        {!! __('results') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                {{-- @include('livewire.backend.order.create') --}}
                {{-- @include('livewire.backend.order.edit') --}}
                @include('livewire.backend.order.detail')
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script type="text/javascript">
  
        $(document).ready(function() {
            $('#search_customer_id').select2();
            $('#search_customer_id').on('change', function(e) {
                var data = $('#search_customer_id').select2("val");
                Livewire.emit('listenerReferenceHere', data);
                @this.set('search_customer_id', data);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {

            @this.on('triggerDelete', deleteId => {
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'This record will be deleted!',
                    type: "warning",
                    showCancelButton: true,
                    // confirmButtonColor: 'var(--success)',
                    // cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Delete!'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('destroy', deleteId)
                        // success response
                        //responseAlert({title: session('message'), type: 'success'});

                    } else {
                        Swal.fire({
                            title: 'Operation Cancelled!',
                            type: 'success'
                        });
                    }
                });
            });
        })
    </script>
@endpush
