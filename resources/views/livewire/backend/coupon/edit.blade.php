<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if (session()->has('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif
            
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
                                class="form-control form-control-lg value" placeholder="Enter Code">
                            @error('value')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Cart Value:</label>
                        <div class="col-12">
                            <input type="text" name="cart_value" id="cart_value" wire:model="cart_value"
                                class="form-control form-control-lg cart_value" placeholder="Enter Code">
                            @error('cart_value')
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
                            class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
$(document).ready(function() {
          $('#editModal').on('shown.bs.modal', function (e) {
            
        });
});
    </script>
@endpush
