<?php

namespace App\Http\Livewire\Backend;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SliderExport;
use App\Lib\Webspice;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class AdminSliderComponent extends Component
{
    public $tableName = 'sliders';
    public $flag = 0;

    public $searchTerm;
    public $status;
    public $pazeSize = 7;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $ids;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;
    public $old_image;
    public $new_image;

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

    public function render($export = null)
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Slider::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', $searchTerm);
                $query->orWhere('top_title', 'LIKE', $searchTerm);
                $query->orWhere('sub_title', 'LIKE', $searchTerm);
                $query->orWhere('offer', 'LIKE', $searchTerm);
                $query->orWhere('link', 'LIKE', $searchTerm);
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

        if ($export == 'excelExport') {
            return Excel::download(new SliderExport($query->get()), 'subcategory_data_' . time() . '.xlsx');
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

        $sliders = $query->paginate($paze_size);
        return view('livewire.backend.slider.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'sliders' => $sliders
        ]);
    }
    public function store()
    {

        # Validate form data
        $this->validate([
            'title' => 'required|min:3|max:50',
            'image' => 'required',
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $slider = new Slider();
            $slider->top_title  = $this->top_title;
            $slider->title      = $this->title;
            $slider->sub_title  = $this->sub_title;
            $slider->offer      = $this->offer;
            $slider->link       = $this->link;
            $imageName          = '';
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
            $slider->image = $imageName;
            $slider->created_by = Auth::user()->id;
            // if($this->image->move($destinationPath, $imageName)){
            if ($this->image->storeAs('sliders', $imageName)) {
                $slider->save();
            }


            if ($slider->id) {
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
        $data = Slider::find($id);

        $this->ids = $data->id;
        $this->top_title = $data->top_title;
        $this->title = $data->title;
        $this->sub_title = $data->sub_title;
        $this->link = $data->link;
        $this->offer = $data->offer;
        $this->old_image = $data->image;
    }
    public function update()
    {

        # Validate form data
        $this->validate([
            'title' => 'required|min:3|max:50',
            // 'new_image' => 'required'
        ]);

        try {

            $this->flag = 1;
            $slider = Slider::find($this->ids);
            $slider->top_title  = $this->top_title;
            $slider->title      = $this->title;
            $slider->sub_title  = $this->sub_title;
            $slider->offer      = $this->offer;
            $slider->link       = $this->link;
            if ($this->new_image) {
                $imageName = '';
                #custom file name        
                $imageName = Carbon::now()->timestamp . "-slider." . $this->new_image->extension();
                $slider->image = $imageName;
                $this->new_image->storeAs('sliders', $imageName);
            }           
            $slider->updated_by = Auth::user()->id;
            $slider->save();

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
            $product = Slider::find($id); 
            unlink('frontend-assets/imgs/sliders/'.$product->image);
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
        $this->top_title = '';
        $this->title = '';
        $this->sub_title = '';
        $this->link = '';
        $this->offer = '';
        $this->image = '';
        $this->old_image = '';
        $this->new_image = '';
    }
}
