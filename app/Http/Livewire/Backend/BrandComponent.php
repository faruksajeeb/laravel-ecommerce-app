<?php

namespace App\Http\Livewire\Backend;

use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BrandComponent extends Component
{
    public $tableName = 'brands';
    public $flag = 0;

    public $searchTerm;
    public $status;
    public $pazeSize;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $ids;
    public $name;
    public $slug;
    public $logo;
    public $new_logo;
    public $old_logo;
    public $export;
    use WithPagination;
    use WithFileUploads;
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

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function render($export = null)
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Brand::select('*');

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', $searchTerm);
                $query->orWhere('slug', 'LIKE', $searchTerm);
            });
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

        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        } else {
            $paze_size = 7;
        }
        $brands = $query->paginate($paze_size);
        return view('livewire.backend.brand.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'brands' => $brands
        ]);
    }

    public function store()
    {
        # Validate form data
        $this->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg',
            'name' =>  [
                'required',
                'min:2',
                'max:100',
                Rule::unique('brands')->ignore($this->ids, 'id')->where(function ($query) {
                    return $query->where('name', $this->name);
                })
            ],
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $brand = new Brand();
            $brand->name = $this->name;
            $brand->slug = $this->slug ?: Str::slug($this->name, '-');
            $brand->created_by = Auth::user()->id;
            $imageName = '';
            if ($this->logo != NULL) {
                #custom file name
                $imageName = Carbon::now()->timestamp . "-brand." . $this->logo->extension();
            }
            $brand->logo = $imageName;
            if ($this->logo->storeAs('brands', $imageName)) {
                $brand->save();
            }

            if ($brand->id) {
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
        $data = Brand::find($id);

        $this->ids = $data->id;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->old_logo = $data->logo;
    }

    public function update()
    {
        # Validate form data
        $this->validate([
            'name' =>  [
                'required',
                'min:2',
                'max:100',
                Rule::unique($this->tableName)->ignore($this->ids, 'id')->where(function ($query) {
                    return $query->where('name', $this->name);
                })
            ],
        ]);

        try {
            $this->flag = 1;
            $data = Brand::find($this->ids);
            $data->name = $this->name;
            $data->slug = $this->slug ?: Str::slug($this->name, '-');
            $data->updated_by = Auth::user()->id;
            if ($this->new_logo) {
                $imageName = '';
                #custom file name
                $imageName = Carbon::now()->timestamp . "-brand." . $this->new_logo->extension();
                $data->logo = $imageName;
                $this->new_logo->storeAs('brands', $imageName);
            }
            $data->save();

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
            $brand = Brand::find($id);
            if ($brand->logo && file_exists(public_path('frontend-assets/imgs/brands/' . $brand->logo))) {
                unlink(public_path('frontend-assets/imgs/brands/' . $brand->logo));
            }
            $brand->delete();
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
        $this->slug = '';
        $this->logo = '';
        $this->new_logo = '';
        $this->old_logo = '';
    }
}
