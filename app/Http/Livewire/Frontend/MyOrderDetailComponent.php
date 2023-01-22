<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use Cartalyst\Stripe\Api\OrderReturns;
use Livewire\Component;

class MyOrderDetailComponent extends Component
{
    public $order;
    protected $listeners = ['viewOrder'];
    public function render()
    {       
        return view('livewire.frontend.my-order-detail-component', [
            'order' => $this->order
        ]);
    }
    public function viewOrder($id)
    {
        $this->order = Order::find($id);
    }

    public function resetInput()
    {
        $this->order = null;
    }
}
