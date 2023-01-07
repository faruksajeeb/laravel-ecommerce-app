<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryComponent extends Component
{
    public $tableName = 'categories';
    public $flag = 0;

    public $searchTerm;
    public $status;
    public $pazeSize;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $ids;
    public $name;
    // public $slug;
    public $edit_name;
    // public $selected = '';
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
        $query = Category::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', $searchTerm);
                $query->orWhere('slug', 'LIKE', $searchTerm);
            });
        }
        # By Option Group 
        // if ($this->name != null) {
        //     $query->where('name', $this->name);
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
            return Excel::download(new CategoryExport($query->get()), 'category_data_' . time() . '.xlsx');
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
        $categories = $query->paginate($paze_size);
        return view('livewire.backend.category.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'categories' => $categories
        ]);
    }
    public function store()
    {

        # Validate form data
        $validator = $this->validate([
            'name' =>  [
                'required',
                Rule::unique('categories')->ignore($this->ids, 'id')->where(function ($query) {
                    return $query->where('name', $this->name);
                })
            ],
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $category = new Category();
            $category->name = $this->name;
            $category->slug = Str::slug($this->name,'-');
            $category->created_by = Auth::user()->id;
            $category->save();

            if ($category->id) {
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
        $data = Category::find($id);
     
        $this->ids = $data->id;
        $this->name = $data->name;
        // $this->slug = $data->slug;
    }
    public function update()
    {
      
        # Validate form data
        $this->validate([
            'name' =>  [
                'required',
                Rule::unique($this->tableName)->ignore($this->ids,'id')->where(function ($query) {
                    return $query->where('name', $this->name);
                })
            ],
        ]);
        
        try {
           
            $this->flag = 1;
            $data = Category::find($this->ids);
           
            $data->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name,'-'),
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
            Category::where('id', $id)->delete();
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
        $this->name = '';
        // $this->slug = '';
    }
}
