<?php

namespace App\Http\Livewire\Backend;

use App\Lib\Webspice;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class OrderComponent extends Component
{
    public $tableName = 'orders';
    public $flag = 0;

    public $customers;
    public $SelectedCustomer = NULL;

    public $searchTerm;
    public $status;
    public $pazeSize = 7;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $search_customer_id;
    public $ids;
    public $order;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->customers = Customer::where('status', 1)->get();
    }

    public function render($export=null)
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Order::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('email', 'LIKE', $searchTerm);
                $query->orWhere('mobile', 'LIKE', $searchTerm);
                $query->orWhere('first_name', 'LIKE', $searchTerm);
                $query->orWhere('last_name', 'LIKE', $searchTerm);
                $query->orWhere('line1', 'LIKE', $searchTerm);
            });
        }
        # By Option Group 
        if ($this->search_customer_id != null) {
            $query->where('customer_id', $this->search_customer_id);
        }
        # By status
        if ($this->status != null) {
            $query->where('status', $this->status);
        }
        # Sort By
        if (($this->orderBy != null) && ($this->sortBy != null)) {
            $query->orderBy($this->orderBy, $this->sortBy);
        } elseif (($this->orderBy != null) && ($this->sortBy == null)) {
            $query->orderBy($this->orderBy, "DESC");
        } elseif (($this->orderBy == null) && ($this->sortBy != null)) {
            $query->orderBy("id", $this->sortBy);
        } else {
            $query->orderBy("id", "DESC");
        }

        if ($export == 'excelExport') {
            return Excel::download(new OrderExport($query->get()), 'order_data_' . time() . '.xlsx');
        }
        // if($export=='pdfExport'){
        //     # Generate PDF  
        //     $data['option'] = $query->get();          
        //     $pdf = PDF::loadView('livewire.option-group.table',$data);
        //     $pdf->set_paper('letter', 'landscape');
        //     return $pdf->download('option-groups-' . time() . '.pdf');
        // }

        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        }

        $orders = $query->paginate($paze_size);
        return view('livewire.backend.order.index',[
            'columns' => Schema::getColumnListing($this->tableName),
            'orders' => $orders
        ]);
    }

    public function orderDetail($id){
        
        $id = Crypt::decryptString($id);
        $this->order = Order::find($id);
    }

    public function resetInput(){
        $this->order = null;
    }

    public function changeStatus($id,$value){
        $currentTime = Webspice::now('datetime24');
        $order = Order::find($id);
        $order->status = $value;
        if($value=='delivered'){
            $order->delivered_date = $currentTime;
        }elseif($value=='canceled'){
            $order->canceled_date = $currentTime;
        }
        $order->updated_at =$currentTime;
        $order->save();
        $this->emit('success','updated');
    }
}
