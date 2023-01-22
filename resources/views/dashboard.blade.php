<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    @push('style')
        <style>
.card-box .card .numbers{
    font-size:405px!important;
}
            </style>
    @endpush
    @can('dashboard.view')
        <div class="card-box p-1">
            <div class="card mx-1">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"><i class="fa-solid fa-bangladeshi-taka-sign"></i> {{$totalRevenue}}</div>
                        <div class="card-name">Total Revenue</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-bangladeshi-taka-sign display-6 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"> {{$totalSales}}</div>
                        <div class="card-name">Total Sales</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-cart-flatbed-suitcase display-6"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"><i class="fa-solid fa-bangladeshi-taka-sign"></i>  {{$todayRevenue}}</div>
                        <div class="card-name">Today Revenue</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-bangladeshi-taka-sign display-6 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"> {{$todaySales}}</div>
                        <div class="card-name">Today Sales</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-cart-flatbed-suitcase display-6"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row align-items-md-stretch">
            <div class="col-md-3">
                <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                    <h2>5000+</h2>
                    <p>Daily Views</p>
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                    <h2>1200</h2>
                    <p>Sales</p>
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                    <h2>2000</h2>
                    <p>Purchase</p>
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                    <h2>100</h2>
                    <p>Comments</p>
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-4">Gutters</h2>
        <div class="row row-cols-1 row-cols-md-3 gx-4 m-1">
            <div class="col themed-grid-col text-center">
                <div class="iconBox">
                    <i class="fa fa-eye"></i>
                </div>
                <div>
                    <div class="numbers">1,024</div>
                    <div class="card-name">Comments</div>
                </div>

            </div>
            <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
            <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
            <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
            <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
            <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
        </div>
        <hr />
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button> --}}

        <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row  p-2">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header bg-white">
                        <h4 class="card-title">Latest 10 Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        {{-- <th>Sl</th> --}}
                                        <th class="text-center">Order ID</th>
                                        <th>Customer Name</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-end">Total</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $k=>$order)                                    
                                    <tr>
                                        {{-- <td>{{$k+1}}</td> --}}
                                        <td class="text-center">{{ $order->id }}</td>
                                        <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                        <td class="text-center"><i class="fa-solid fa-mobile-retro"></i> {{ $order->mobile }}</td>
                                        <td class="text-center"><i class="fa-solid fa-envelope"></i> {{ $order->email }}</td>
                                        <td class="text-end"><i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $order->total }}</td>
                                        <td class="text-center"><i class="fa-solid fa-calander"></i> {{ $order->created_at }}</td>
                                        <td class="text-center"><i class="fa-solid fa-calander"></i> {!! App\Lib\Webspice::textStatus($order->status) !!}</td>
                                    </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    @endcan
</x-app-layout>
