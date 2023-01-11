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
use Livewire\WithFileUploads;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

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
    public $newImage;
    public $oldImage;
    public $images;

    // public $slug;
    public $search_category_id;
    public $subcategory_id;
    // public $selected = '';
    public $export;
    use WithPagination;
    use WithFileUploads;
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

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
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
        $this->validate([
            'name' => 'required|min:3|max:50',
            'slug' => 'required',
            'SKU' => 'required',
            'quantity' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'image' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'SelectedCategory' => 'required',
            'subcategory_id' =>  [
                'required',
                Rule::unique($this->tableName)->where(function ($query) {
                    return $query->where('category_id', $this->SelectedCategory)
                        ->where('subcategory_id', $this->subcategory_id)
                        ->where('name', $this->name);
                })
            ],
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $product = new Product();
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $imageName = '';
            if ($this->image != NULL) {
                #custom file name        
                $imageName = Carbon::now()->timestamp . "-product." . $this->image->extension();
            }
            # Upload Image
            // $destinationPath = 'frontend-assets/imgs/products';
            // if (File::exists(public_path($destinationPath . '/' . $existingRecord->website_favicon))) {
            //     File::delete(public_path($destinationPath . '/' . $existingRecord->website_favicon));
            // }            
            // $this->image->storeAs('products',$imageName);
            $product->image = $imageName;
            $product->images = NULL;
            $product->category_id = $this->SelectedCategory;
            $product->subcategory_id = $this->subcategory_id;
            $product->created_by = Auth::user()->id;
            // if($this->image->move($destinationPath, $imageName)){
            if ($this->image->storeAs('products', $imageName)) {
                $product->save();
            }


            if ($product->id) {
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
        $this->SelectedCategory = $data->category_id;
        $this->subcategory_id = $data->subcategory_id;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->short_description = $data->short_description;
        $this->description = $data->description;
        $this->regular_price = $data->regular_price;
        $this->sale_price = $data->sale_price;
        $this->SKU = $data->SKU;
        $this->stock_status = $data->stock_status;
        $this->featured = $data->featured;
        $this->quantity = $data->quantity;
        $this->oldImage = $data->image;
    }
    public function update()
    {

        # Validate form data
        $this->validate([
            'name' => 'required|min:3|max:50',
            'slug' => 'required',
            'SKU' => 'required',
            'quantity' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            // 'image' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'SelectedCategory' => 'required',
            'subcategory_id' =>  [
                'required',
                Rule::unique($this->tableName)->ignore($this->ids, 'id')->where(function ($query) {
                    return $query->where('category_id', $this->SelectedCategory)
                        ->where('subcategory_id', $this->subcategory_id)
                        ->where('name', $this->name);
                })
            ],
        ]);

        try {

            $this->flag = 1;
            $product = Product::find($this->ids);
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $product->category_id = $this->SelectedCategory;
            $product->subcategory_id = $this->subcategory_id;
            if ($this->newImage) {
                $imageName = '';
                #custom file name        
                $imageName = Carbon::now()->timestamp . "-product." . $this->newImage->extension();
                $product->image = $imageName;
                $this->newImage->storeAs('products', $imageName);
            }           
            $product->updated_by = Auth::user()->id;
            $product->save();

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
        $this->SelectedCategory = '';
        $this->subcategory_id = '';
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->SKU = '';
        $this->stock_status = '';
        $this->featured = '';
        $this->quantity = '';
        $this->image = '';
        $this->images = '';
    }
}
