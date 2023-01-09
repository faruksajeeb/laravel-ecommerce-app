@push('styles')
    <style>

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
                                <input name="slug" wire:model='slug' class="form-control slug  @error('name') is-invalid @enderror"
                                    readonly value="" type="text" required>
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
                                <select name="category_id" wire:model='SelectedCategory' 
                                    class="form-select  category_id  @error('category_id') is-invalid @enderror">
                                    <option value="" >--Choose a category--</option>
                                    @foreach ($categories as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if (!is_null($SelectedCategory))
                            <div class="form-group">
                                <label>Subcategory <span class="text-danger">*</span></label>
                                <select name="subcategory_id" wire:model='subcategory_id' placeholder='Select a subcategory'
                                    class="form-select   subcategory_id  @error('subcategory_id') is-invalid @enderror">
                                    <option value="" >--Choose a Subcategory--</option>
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
                                <input name="quantity"
                                    class="form-control quantity  @error('quantity') is-invalid @enderror" readonly
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
                                <input name="sale_price"
                                    class="form-control sale_price  @error('sale_price') is-invalid @enderror" readonly
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
                                    class="form-control image @error('image') is-invalid @enderror" type="file"
                                    required>

                                @error('image')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label></label>
                                {{-- <input name="sale_price" class="form-control sale_price  @error('sale_price') is-invalid @enderror"
                                    readonly value="" type="text" placeholder="Enter initial qty" required>
                                <div class="invalid-feedback error_msg sale_price_err">Sale price is required!</div>
                                @error('sale_price')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Short Description:</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <label for="">Description:</label>
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <label for="">Features:</label>
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
        });
    </script>
@endpush
