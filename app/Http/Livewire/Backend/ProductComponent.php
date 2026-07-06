<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\OrderDetail;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

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
    public $images = [];

    public $oldImages;
    public $newImages;

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
        $this->subcategory_id = null;
        if (!is_null($SelectedCategory)) {
            $this->subcategories = Subcategory::where('category_id', $SelectedCategory)->get();
        } else {
            $this->subcategories = collect();
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

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:3|max:50',
            'slug' => 'nullable|string|max:100',
            'SKU' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png',
            'stock_status' => 'required|in:instock,outofstock',
            'featured' => 'required|in:0,1',
            'SelectedCategory' => 'required|exists:categories,id'
        ]);
        if ($this->newImage) {
            $this->validateOnly($fields, [
                'newImage' => 'required|image|mimes:jpeg,png'
            ]);
        }
        if ($this->newImages) {
            $this->validateOnly($fields, [
                'newImages.*' => 'image|mimes:jpeg,png'
            ]);
        }
    }

    public function render($export = null)
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Product::select(
            '*'
        );
        $paze_size = $this->pazeSize;

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
            return Excel::download(new ProductExport($query->get()), 'product_list_' . time() . '.xlsx');
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
        $this->subcategory_id = $this->subcategory_id ?: null;
        $this->sale_price = $this->sale_price ?: null;

        try {
            $this->validate([
                'name' => 'required|min:3|max:50',
                'slug' => 'nullable|string|max:100',
                'SKU' => 'required|string|max:100',
                'quantity' => 'required|integer|min:0',
                'regular_price' => 'required|numeric|min:0',
                'sale_price' => 'nullable|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png',
                'stock_status' => 'required|in:instock,outofstock',
                'featured' => 'required|in:0,1',
                'SelectedCategory' => 'required|exists:categories,id',
                'subcategory_id' => ['nullable', 'exists:subcategories,id'],
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png',
            ]);

            $this->flag = 1;
            $product = new Product();
            $product->name = trim($this->name);
            $product->slug = $this->slug ?: Str::slug($this->name, '-');
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
            $product->created_by = Auth::user()->id;

            Storage::disk('local')->makeDirectory('products');
            if ($this->image != null) {
                $imageName = Carbon::now()->timestamp . '-product.' . $this->image->extension();
                $this->image->storeAs('products', $imageName, 'local');
                $product->image = $imageName;
            }

            $images = [];
            if (!empty($this->images) && is_array($this->images)) {
                foreach ($this->images as $key => $image) {
                    $galleryName = Carbon::now()->timestamp . '-' . $key . '-product.' . $image->extension();
                    $image->storeAs('products', $galleryName, 'local');
                    $images[] = $galleryName;
                }
                $product->images = implode(',', $images);
            }

            $product->save();

            if ($product->id) {
                $this->resetInputFields();
                Webspice::log($this->tableName, $this->ids, 'INSERT');
                Cache::forget($this->tableName);
                $this->emit('success', 'success', 'Product created successfully.');
            }
        } catch (ValidationException $e) {
            $this->emit('error', 'error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            $this->emit('error', 'error', 'Unable to create product. ' . $e->getMessage());
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
        $this->updatedSelectedCategory($data->category_id);
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
        $this->oldImages = explode(",",$data->images);
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
        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpeg,png'
            ]);
        }
        if($this->newImages){
            $this->validate([
                'newImages.*' => 'mimes:jpeg,png'
            ]);
        }

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
            Storage::disk('local')->makeDirectory('products');
            if ($this->newImage) {
                if($product->image && Storage::disk('local')->exists('products/' . $product->image)){
                    Storage::disk('local')->delete('products/' . $product->image);
                }
                $imageName = Carbon::now()->timestamp . "-product." . $this->newImage->extension();
                $this->newImage->storeAs('products', $imageName, 'local');
                $product->image = $imageName;
            }
            if ($this->newImages) {
                if($product->images){
                    $images = explode(",",$product->images);
                    foreach($images as $image){
                        if($image && Storage::disk('local')->exists('products/' . $image)){
                            Storage::disk('local')->delete('products/' . $image);
                        }
                    }
                }
                $images = [];
                foreach ($this->newImages as $key => $image) {
                    $galleryName = Carbon::now()->timestamp . '-' . $key . "-product." . $image->extension();
                    $image->storeAs('products', $galleryName, 'local');
                    $images[] = $galleryName;
                }
                $product->images = implode(',', $images);
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
            $product = Product::find($id);

            #before delete please check product id on orders or relevant table if exist then not allow to delete
            // Implementation for checking related records would go here
            #select from order_details where product_id = $id
            $relatedRecords = OrderDetail::where('product_id', $id)->exists();
            if ($relatedRecords) {
                $this->emit('error', 'Cannot delete product with related order records.');
                return;
            }
            if ($product->image) {
                unlink('frontend-assets/imgs/products/' . $product->image);
            }
            if ($product->images) {
                $images = explode(",",$product->images);
                foreach ($images as $image) {
                    if ($image) {
                        unlink('frontend-assets/imgs/products/' . $image);
                    }
                }
            }
            

            $product->delete();
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
        $this->subcategory_id = null;
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->SKU = '';
        $this->stock_status = 'instock';
        $this->featured = '0';
        $this->quantity = '';
        $this->image = null;
        $this->newImage = null;
        $this->oldImage = '';
        $this->images = [];
        $this->oldImages = [];
    }
}
