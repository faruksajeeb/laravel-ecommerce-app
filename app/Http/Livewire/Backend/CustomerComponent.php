<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CustomerComponent extends Component
{
    public $tableName = 'customers';
    public $flag = 0;

    public $searchTerm;
    public $pazeSize;
    public $orderBy;
    public $sortBy;    
    public $status;

    public $ids;
    public $customer_name;
    public $email;
    public $mobile;
    public $present_address;
    public $permenent_address;
    public $shipping_address;

    // public $selected = '';
    public $export;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function resetInputFields()
    {
        $this->ids = '';
        $this->customer_name = '';
        $this->email = '';
        $this->mobile = '';
        $this->present_address = '';
        $this->permenent_address = '';
        $this->shipping_address = '';
        $this->resetErrorBag();
    }
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
        $query = Customer::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('customer_name', 'LIKE', $searchTerm);
                $query->orWhere('email', 'LIKE', $searchTerm);
                $query->orWhere('mobile', 'LIKE', $searchTerm);
                $query->orWhere('present_address', 'LIKE', $searchTerm);
                $query->orWhere('permenent_address', 'LIKE', $searchTerm);
                $query->orWhere('shipping_address', 'LIKE', $searchTerm);
            });
        }
        # By Option Group 
        // if ($this->search_category_id != null) {
        //     $query->where('category_id', $this->search_category_id);
        // }
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
            return Excel::download(new CustomerExport($query->get()), 'customer_data_' . time() . '.xlsx');
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
        $customers = $query->paginate($paze_size);
        return view('livewire.backend.customer.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            // 'categories' => DB::table('categories')->select('*')->where('status', 1)->get(),
            'customers' => $customers
        ]);
    }
    public function store()
    {

        # Validate form data
        $validator = $this->validate([
            'category_id' => 'required',
            'subcategory_name' =>  [
                'required',
                Rule::unique($this->tableName)->ignore($this->ids, 'id')->where(function ($query) {
                    return $query->where('category_id', $this->category_id)
                    ->where('subcategory_name', $this->subcategory_name);
                })
            ],
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $subcategory = new Customer();
            $subcategory->category_id = $this->category_id;
            $subcategory->subcategory_name = $this->subcategory_name;
            $subcategory->created_by = Auth::user()->id;
            $subcategory->save();

            if ($subcategory->id) {
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
        $data = Customer::find($id);
     
        $this->ids = $data->id;
        $this->category_id = $data->category_id;
        $this->subcategory_name = $data->subcategory_name;
        // $this->slug = $data->slug;
    }
    public function update()
    {
      
        # Validate form data
        $this->validate([
            'category_id' => 'required',
            'subcategory_name' =>  [
                'required',
                Rule::unique($this->tableName)->ignore($this->ids,'id')->where(function ($query) {
                    return $query->where('category_id', $this->category_id)
                    ->where('subcategory_name', $this->subcategory_name);
                })
            ],
        ]);
        
        try {
           
            $this->flag = 1;
            $data = Customer::find($this->ids);
           
            $data->update([
                'category_id' => $this->category_id,
                'subcategory_name' => $this->subcategory_name,
                'updated_by' => Auth::user()->id
            ]);
           
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
            Customer::where('id', $id)->delete();
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
   
}
