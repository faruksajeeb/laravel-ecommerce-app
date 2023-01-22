<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Lib\Webspice;

class MyOrderComponent extends Component
{
    public $pageSize = 10;
    public $order;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $myOrders = Order::where('customer_id', Auth::guard('customer')->user()->id)->paginate($this->pageSize);
        return view('livewire.frontend.my-order-component', ['my_orders' => $myOrders])->extends('livewire.frontend.master');
    }

    public function viewOrder($id)
    {
        //$this->order = Order::find($id);
        $this->emit('viewOrder', $id);
    }

    public function cancelOrder($id)
    {
        $currentTime = Webspice::now('datetime24');
        $order = Order::find($id);
        if ($order->status == 'ordered') {
            $order->status = 'canceled';
            $order->canceled_date = $currentTime;
            $order->updated_at = $currentTime;
            $order->save();
            $this->emit('added', 'Your order has been canceled successfully.');
        } else {
            $this->emit('error', 'Order already '.$order->status);
        }
    }
}
