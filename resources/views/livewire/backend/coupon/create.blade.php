@push('styles')
    <style>

    </style>
@endpush
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addModal" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form wire:submit.prevent="store">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Create Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"  style="overflow:hidden;">

                    @if (session()->has('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="form-group row">
                        <label for="" class="form-label">Type:</label>
                        <div class="col-12">                  
                                <select name="type" wire:model='type'
                                    class="form-select type">
                                    <option value="">--select type--</option>
                                    <option value="percent">Percent</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                           
                            @error('type')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Code:</label>
                        <div class="col-12">
                            <input type="text" name="code" id="code" wire:model="code"
                                class="form-control form-control-lg code" placeholder="Enter Code">
                            @error('code')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Value:</label>
                        <div class="col-12">
                            <input type="text" name="value" id="value" wire:model="value"
                                class="form-control form-control-lg value" placeholder="Enter Value">
                            @error('value')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Cart Value:</label>
                        <div class="col-12">
                            <input type="text" name="cart_value" id="cart_value" wire:model="cart_value"
                                class="form-control form-control-lg cart_value" placeholder="Enter Cart Value">
                            @error('cart_value')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Expiry Date:</label>
                        
                        <div class="col-12">
                            <input type="text" name="expiry_date" id="expiry_date" wire:model="expiry_date"
                                class="form-control form-control-lg datepicker"  data-date-format="yyyy-mm-dd" placeholder="Enter expiry date">
                            @error('expiry_date')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
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
       $('#expiry_date').on('change', function(e) {
                var expiry_date = $('#expiry_date').val();     
                 alert(expiry_date);       
                @this.set('expiry_date', expiry_date);
            });
     
            // $('.datepicker').datepicker();
          //  $("#option_group").select2({ dropdownParent: "#addModal" });
          $('#addModal').on('shown.bs.modal', function (e) {
            // $('.category_id').select2({
            // placeholder: 'Select a category',
            // dropdownParent:$('.category_id').parent(),
            // });
            $('.type').on('change', function(e) {
                var data = $(this).val();
                Livewire.emit('listenerReferenceHere',data);               
                @this.set('type', data);
                // $('#option_group').select2();
            });
        });
});
</script>
@endpush
