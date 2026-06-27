@push('styles')
    <style>

    </style>
@endpush
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form wire:submit.prevent="store">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Customer Register
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
                        <label for="option-group" class="form-label">Category Name:</label>
                        <div class="col-12">
                            <input type="text" name="name" id="name" wire:model="name"
                                class="form-control form-control-lg name" placeholder="Enter Category Name">
                            @error('name')
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
         $(document).ready(function() {
          //  $("#option_group").select2({ dropdownParent: "#addModal" });
          $('#addModal').on('shown.bs.modal', function (e) {
            $('#option_group').select2({
            placeholder: 'Select an option group',
            dropdownParent:$('#option_group').parent(),
            });
            $('#option_group').on('change', function(e) {
                var data = $(this).val();
                Livewire.emit('listenerReferenceHere',data);               
                @this.set('option_group', data);
                // $('#option_group').select2();
            });
        });
});
</script>
@endpush
