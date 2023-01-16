<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CouponExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Coupon;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CouponComponent extends Component
{
    public $tableName = 'coupons';
    public $flag = 0;

    public $ids;
    public $searchTerm;
    public $search_type;
    public $status;
    public $pazeSize;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public $edit_expiry_date;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;
    public $export;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedorderBy()
    {
        $this->resetPage();
    }
    public function updatedsortBy()
    {
        $this->resetPage();
    }
    public function updatedpazeSize()
    {
        $this->resetPage();
    }
    public function render($export = null)
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Coupon::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('code', 'LIKE', $searchTerm);
                $query->where('value', 'LIKE', $searchTerm);
                $query->where('cart_value', 'LIKE', $searchTerm);
            });
        }
        # By Option Group 
        if ($this->search_type != null) {
            $query->where('type', $this->search_type);
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
            return Excel::download(new CouponExport($query->get()), 'subcategory_data_' . time() . '.xlsx');
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
        } else {
            $paze_size = 7;
        }
        $coupons = $query->paginate($paze_size);
        return view('livewire.backend.coupon.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'coupons' => $coupons
        ]);
    }
    public function store()
    {

        # Validate form data
        $validator = $this->validate([
            'type' => 'required',
            'code' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'expiry_date' => 'required'
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $coupon = new Coupon();
            $coupon->type = $this->type;
            $coupon->code = $this->code;
            $coupon->value = $this->value;
            $coupon->cart_value = $this->cart_value;
            $coupon->expiry_date = $this->expiry_date;
            $coupon->created_by = Auth::user()->id;
            $coupon->save();

            if ($coupon->id) {
                # Reset form
                $this->resetInputFields();
                # Write Log
                Webspice::log($this->tableName, $this->ids, 'INSERT');
                # Cache Update
                Cache::forget($this->tableName);
                $this->emit('success', 'inserted');
            }
        } catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
        }

        $this->flag = 0;
    }
    public function edit($id)
    {
       
        $this->resetInputFields();
        $id = Crypt::decryptString($id);
        $data = Coupon::find($id);
     
        $this->ids          = $data->id;
        $this->type         = $data->type;
        $this->code         = $data->code;
        $this->value        = $data->value;
        $this->cart_value   = $data->cart_value;
        $this->expiry_date   = $data->expiry_date;
    }
    public function update()
    {
      
        # Validate form data
        $this->validate([
            'type' => 'required',
            'code' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'edit_expiry_date' => 'required',
        ]);
        
        try {
                       
            $this->flag = 1;
            $coupon = Coupon::find($this->ids);
            $coupon->type = $this->type;
            $coupon->code = $this->code;
            $coupon->value = $this->value;
            $coupon->cart_value = $this->cart_value;
            $coupon->expiry_date = $this->edit_expiry_date;
            $coupon->updated_by = Auth::user()->id;
            $coupon->save();
           
            # Write Log
            Webspice::log($this->tableName, $this->ids, 'UPDATE');
            # Cache Update
            Cache::forget($this->tableName);
            # reset form
            $this->resetInputFields();
            # Return Message
            $this->emit('success', 'updated');
        } catch (\Exception $e) {
            # Return Message
            $this->emit('error', $e->getMessage());
        }

        $this->flag = 0;
    }
    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
            $coupon = Coupon::find($id); 
            $coupon->delete();
            # Write Log
            Webspice::log($this->tableName, $id, 'DELETE');
            # Cache Update
            Cache::forget($this->tableName);
            # Success message
            $this->emit('success', 'deleted');
        } catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function resetInputFields()
    {
        $this->resetErrorBag();
        $this->ids          = '';
        $this->type         = '';
        $this->code         = '';
        $this->value        = '';
        $this->cart_value   = '';
        $this->expiry_date   = '';
        $this->edit_expiry_date   = '';
    }
}
