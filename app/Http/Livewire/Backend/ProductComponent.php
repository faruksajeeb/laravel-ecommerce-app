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

use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\ProductVariation;
use App\Models\Subcategory;
use Carbon\Carbon;

class ProductComponent extends Component
{

    public $tableName = 'products';
    public $flag = 0;

    public $categories;
    public $subcategories;
    public $brands;
    public $tags;
    public $brand_id = null;
    public $selectedTags = [];
    public $SelectedCategory = NULL;

    public $searchTerm;
    public $status;
    public $search_brand_id;
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
    public $featured;
    public $image;
    public $newImage;
    public $oldImage;
    public $images = [];

    public $oldImages;
    public $newImages;

    // public $slug;
    public $search_category_id;
    public $subcategory_id;
    public $variations = [];
    // public $selected = '';
    public $export;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->subcategories = collect();
        $this->brands = Brand::where('status', 1)->get();
        $this->tags = Option::where('option_group_name', 'tags')->where('status', 1)->get();

        
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

    public function addVariation()
    {
        $this->variations[] = ['size' => '', 'color' => '', 'quantity' => 0, 'sku' => '', 'barcode' => ''];
    }

    public function removeVariation($index)
    {
        unset($this->variations[$index]);
        $this->variations = array_values($this->variations);
    }

    protected function saveVariations($productId)
    {
        ProductVariation::where('product_id', $productId)->delete();

        $total = 0;
        foreach ($this->variations as $variation) {
            if (empty($variation['size']) && empty($variation['color'])) {
                continue;
            }
            $quantity = (int) ($variation['quantity'] ?? 0);
            $total += $quantity;
            ProductVariation::create([
                'product_id' => $productId,
                'size' => $variation['size'] ?: null,
                'color' => $variation['color'] ?: null,
                'quantity' => $quantity,
                'sku' => $variation['sku'] ?: null,
                'barcode' => $variation['barcode'] ?: null,
            ]);
        }

        return $total;
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
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png',
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
        # Reference/lookup data is re-queried on every render so it is not lost
        # when Livewire dehydrates/rehydrates the component between requests.
        $this->brands = Brand::where('status', 1)->get();
        $this->tags = Option::where('option_group_name', 'tags')->where('status', 1)->get();

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Product::with(['brand', 'tags'])->select(
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
        # By brand
        if ($this->search_brand_id != null) {
            $query->where('brand_id', $this->search_brand_id);
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
            'products' => $products,
            'sizes' => Option::where('option_group_name', 'Size')->pluck('option_value')->toArray(),
            'colors' => Option::where('option_group_name', 'Color')->pluck('option_value')->toArray(),
            'brands' => $this->brands,
            'tags' => Option::where('option_group_name', 'tags')->where('status', 1)->get(),
            'categories' => $this->categories,
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
                'regular_price' => 'required|numeric|min:0',
                'sale_price' => 'nullable|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png',
                'featured' => 'required|in:0,1',
                'SelectedCategory' => 'required|exists:categories,id',
                'subcategory_id' => ['nullable', 'exists:subcategories,id'],
                'brand_id' => ['nullable', 'exists:brands,id'],
                'selectedTags' => 'nullable|array',
                'selectedTags.*' => 'nullable|exists:options,id',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png',
                'variations' => 'nullable|array',
                'variations.*.size' => 'nullable|string|max:50',
                'variations.*.color' => 'nullable|string|max:50',
                'variations.*.quantity' => 'nullable|integer|min:0',
                'variations.*.sku' => 'nullable|string|max:100',
                'variations.*.barcode' => 'nullable|string|max:100',
            ]);

            $this->flag = 1;
            $product = new Product();
            $product->name = trim($this->name);
            $product->slug = $this->slug ?: Str::slug($this->name, '-');
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->featured = $this->featured;
            $product->category_id = $this->SelectedCategory;
            $product->subcategory_id = $this->subcategory_id;
            $product->brand_id = $this->brand_id ?: null;
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

            if (!empty($this->selectedTags)) {
                $product->tags()->sync($this->selectedTags);
            }

            if (!empty($this->variations)) {
                $total = $this->saveVariations($product->id);
                $product->quantity = $total;
                $product->stock_status = $total > 0 ? 'instock' : 'outofstock';
                $firstSku = collect($this->variations)->firstWhere('sku', '!=', '');
                if ($firstSku) {
                    $product->SKU = $firstSku['sku'];
                }
                $product->save();
            }

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
        $this->brand_id = $data->brand_id;
        $this->selectedTags = $data->tags->pluck('id')->toArray();
        $this->variations = $data->variations()->get()->map(function ($v) {
            return [
                'size' => $v->size,
                'color' => $v->color,
                'quantity' => $v->quantity,
                'sku' => $v->sku,
                'barcode' => $v->barcode,
            ];
        })->toArray();
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->short_description = $data->short_description;
        $this->description = $data->description;
        $this->regular_price = $data->regular_price;
        $this->sale_price = $data->sale_price;
        $this->featured = $data->featured;
        $this->oldImage = $data->image;
        $this->oldImages = explode(",",$data->images);

        $this->dispatchBrowserEvent('tags-loaded', $this->selectedTags);
    }
    public function update()
    {

        # Validate form data
        $this->validate([
            'name' => 'required|min:3|max:50',
            'slug' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
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
            'brand_id' => ['nullable', 'exists:brands,id'],
            'selectedTags' => 'nullable|array',
            'selectedTags.*' => 'nullable|exists:options,id',
            'variations' => 'nullable|array',
            'variations.*.size' => 'nullable|string|max:50',
            'variations.*.color' => 'nullable|string|max:50',
            'variations.*.quantity' => 'nullable|integer|min:0',
            'variations.*.sku' => 'nullable|string|max:100',
            'variations.*.barcode' => 'nullable|string|max:100',
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
            $product->featured = $this->featured;
            $product->category_id = $this->SelectedCategory;
            $product->subcategory_id = $this->subcategory_id;
            $product->brand_id = $this->brand_id ?: null;
            $product->updated_by = Auth::user()->id;
            $product->save();

            if (!empty($this->selectedTags)) {
                $product->tags()->sync($this->selectedTags);
            } else {
                $product->tags()->detach();
            }

            if (!empty($this->variations)) {
                $total = $this->saveVariations($product->id);
                $product->quantity = $total;
                $product->stock_status = $total > 0 ? 'instock' : 'outofstock';
                $firstSku = collect($this->variations)->firstWhere('sku', '!=', '');
                if ($firstSku) {
                    $product->SKU = $firstSku['sku'];
                }
                $product->save();
            }

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
        $this->brand_id = null;
        $this->selectedTags = [];
        $this->variations = [];
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->featured = '0';
        $this->image = null;
        $this->newImage = null;
        $this->oldImage = '';
        $this->images = [];
        $this->oldImages = [];
    }
}
