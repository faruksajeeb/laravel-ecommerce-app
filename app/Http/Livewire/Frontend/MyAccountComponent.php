<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyAccountComponent extends Component
{
    // public $myOrders;
    public $pageSize = 10;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        $myOrders = Order::where('customer_id',Auth::guard('customer')->user()->id)->paginate($this->pageSize);
        return view('livewire.frontend.my-account-component',[
            'my_orders' => $myOrders
        ])->extends('livewire.frontend.master');
    }

    public function customerLogout(){
        Auth::guard('customer')->logout();
        return redirect()->route('/');
    }
}
