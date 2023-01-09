<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Subcategory;

class ProductComponent extends Component
{
    public $tableName = 'products';
    public $flag = 0;

    public $categories;
    public $subcategories;
    public $SelectedCategory = NULL;

    public $searchTerm;
    public $status;
    public $pazeSize = 7;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $ids;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;

    // public $slug;
    public $search_category_id;
    public $subcategory_id;
    // public $selected = '';
    public $export;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->subcategories = collect();
    }
    public function updatedSelectedCategory($SelectedCategory)
    {       
        if (!is_null($SelectedCategory)) {
            $this->subcategories = Subcategory::where('category_id', $SelectedCategory)->get();
        }
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
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
        $query = Product::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', $searchTerm);
                $query->orWhere('slug', 'LIKE', $searchTerm);
                $query->orWhere('short_description', 'LIKE', $searchTerm);
                $query->orWhere('description', 'LIKE', $searchTerm);
                $query->orWhere('regular_price', 'LIKE', $searchTerm);
                $query->orWhere('SKU', 'LIKE', $searchTerm);
                $query->orWhere('stock_status', 'LIKE', $searchTerm);
                $query->orWhere('featured', 'LIKE', $searchTerm);
                $query->orWhere('quantity', 'LIKE', $searchTerm);
            });
        }
        # By Option Group 
        if ($this->search_category_id != null) {
            $query->where('category_id', $this->search_category_id);
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
            return Excel::download(new ProductExport($query->get()), 'subcategory_data_' . time() . '.xlsx');
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

        $products = $query->paginate($paze_size);
        return view('livewire.backend.product.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'products' => $products
        ]);
    }
    public function store()
    {

        # Validate form data
        $validator = $this->validate([
            'name' => 'required|min:3|max:50',
            'slug' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
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
            $subcategory = new Product();
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
        $data = Product::find($id);
     
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
            $data = Product::find($this->ids);
           
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
            Product::where('id', $id)->delete();
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
        $this->ids = '';
        $this->category_id = '';
        $this->subcategory_name = '';
    }
}
