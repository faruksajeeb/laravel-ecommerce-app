@push('styles')
    <style>
/*
 * Configure the z-index of the editor UI, so when inside a Bootstrap
 * modal, it will be rendered over the modal.
 */
 body {
    --ck-z-default: 100;
    --ck-z-modal: calc( var(--ck-z-default) + 999 );
}
    </style>
@endpush
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="store" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow:hidden;">

                    @if (session()->has('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input name="name" wire:model="name" wire:keyup='generateSlug'
                                    class="form-control @error('name') is-invalid @enderror" type="text"
                                    value="" placeholder="Enter product name" required>
                                @error('name')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Slug <span class="text-danger">*</span></label>
                                <input name="slug" wire:model='slug'
                                    class="form-control slug  @error('name') is-invalid @enderror" readonly
                                    value="" type="text" required>
                                @error('slug')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="SelectedCategory" wire:model='SelectedCategory'
                                    class="form-select  SelectedCategory  @error('SelectedCategory') is-invalid @enderror">
                                    <option value="">--Choose a category--</option>
                                    @foreach ($categories as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('SelectedCategory')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if (!is_null($SelectedCategory))
                                <div class="form-group">
                                    <label>Subcategory <span class="text-danger">*</span></label>
                                    <select name="subcategory_id" wire:model='subcategory_id'
                                        placeholder='Select a subcategory'
                                        class="form-select   subcategory_id  @error('subcategory_id') is-invalid @enderror">
                                        <option value="">--Choose a Subcategory--</option>
                                        @foreach ($subcategories as $val)
                                            <option value="{{ $val->id }}">{{ $val->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <div class="invalid-feedback error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>SKU <span class="text-danger">*</span></label>
                                <input name="SKU" wire:model="SKU"
                                    class="form-control @error('SKU') is-invalid @enderror" type="text"
                                    value="" placeholder="Enter product SKU" required>
                                @error('SKU')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Initial Quantity <span class="text-danger">*</span></label>
                                <input name="quantity" wire:model='quantity'
                                    class="form-control quantity  @error('quantity') is-invalid @enderror" 
                                    value="" type="text" placeholder="Enter initial qty" required>
                                @error('quantity')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Regular Price <span class="text-danger">*</span></label>
                                <input name="regular_price" wire:model="regular_price"
                                    class="form-control regular_price @error('regular_price') is-invalid @enderror"
                                    type="text" value="" placeholder="Enter regular price" required>

                                @error('regular_price')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sale Price <span class="text-danger">*</span></label>
                                <input name="sale_price" wire:model='sale_price'
                                    class="form-control sale_price  @error('sale_price') is-invalid @enderror" 
                                    value="" type="text" placeholder="Enter sale price" required>

                                @error('sale_price')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Image <span class="text-danger">*</span></label>
                                <input name="image" wire:model="image"
                                    class="form-control add-image image @error('image') is-invalid @enderror" type="file"
                                    required>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl()}}" width="100" alt="product image" />
                                @endif
                                @error('image')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Stock <span class="text-danger">*</span></label>
                                <select name="stock_status" wire:model='stock_status'
                                    placeholder='Select a stock_status'
                                    class="form-select   stock_status  @error('stock_status') is-invalid @enderror" required>
                                    <option value=""> Select Status</option>
                                    <option value="instock"> In Stock</option>
                                    <option value="outofstock"> Out of stock</option>
                                </select>
                                @error('stock_status')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Gallery <span class="text-danger">*</span></label>
                                <input name="images" wire:model="images"
                                    class="form-control add-image images @error('images') is-invalid @enderror" type="file"
                                    multiple>
                                @if ($images)
                                    @foreach ($images as $image)                                    
                                        <img src="{{ $image->temporaryUrl()}}" width="100" alt="product images" />
                                    @endforeach
                                @endif
                                @error('images')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <label for="">Featured: <span class="text-danger">*</span></label>
                            <select name="featured" wire:model='featured' placeholder='Select a featured'
                                class="form-select   featured  @error('featured') is-invalid @enderror" required>
                                <option value=""> Select Featured </option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>
                            </select>
                            @error('featured')
                            <div class="invalid-feedback error_msg">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Short Description:</label>
                                <textarea name="short_description" id="short_description" wire:model='short_description' cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <label for="">Description:</label>
                            <textarea name="description" id="description" wire:model='description' cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetInputFields()"><i class="fa fa-remove"></i> Close</button>


                    <button type="button" class="btn btn-warning" wire:click="resetInputFields()"><i
                            class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-primary" {{ $flag == 1 ? 'disabled' : '' }}><i
                            class="fa fa-save"></i> Save New</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
      
            //  $("#option_group").select2({ dropdownParent: "#addModal" });
            $('#addModal').on('shown.bs.modal', function(e) {
                // $(document).off('focusin.modal');
                focus: false
                // $('.category_id').select2({
                //     placeholder: 'Select a category',
                //     dropdownParent: $('.category_id').parent(),
                // });
                // $('.subcategory_id').select2({
                //     placeholder: 'Select a subcategory',
                //     dropdownParent: $('.subcategory_id').parent(),
                // });
                $('.category_id').on('change', function(e) {
                    var data = $(this).val();
                    Livewire.emit('listenerReferenceHere', data);
                    @this.set('category_id', data);
                    // $('#option_group').select2();
                });
            });
            product_image.onchange = evt => {
            const [file] = product_image.files
            if (file) {
                product_image_preview.src = URL.createObjectURL(file)
            }
        }
        });
        ClassicEditor
            .create( document.querySelector( '#short_description' ) )
            .catch( error => {
                console.error( error );
            } );
            
    </script>
@endpush
