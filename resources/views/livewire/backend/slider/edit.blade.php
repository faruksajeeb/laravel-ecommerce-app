<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Slider
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    @if (session()->has('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Top Title <span class="text-danger">*</span></label>
                                <input name="top_title" wire:model="top_title"
                                    class="form-control @error('top_title') is-invalid @enderror" type="text"
                                    value="" placeholder="Enter top title" required>
                                @error('top_title')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Title <span class="text-danger"></span></label>
                                <input name="title" wire:model='title'
                                    class="form-control title  @error('title') is-invalid @enderror" value=""
                                    type="text" required>
                                @error('title')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sub Title <span class="text-danger">*</span></label>
                                <input name="sub_title" wire:model="sub_title"
                                    class="form-control @error('sub_title') is-invalid @enderror" type="text"
                                    value="" placeholder="Enter sub title" required>
                                @error('sub_title')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Offer <span class="text-danger">*</span></label>
                                <input name="offer" wire:model='offer'
                                    class="form-control offer  @error('offer') is-invalid @enderror" value=""
                                    type="text" placeholder="Enter initial offer" required>
                                @error('offer')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Link <span class="text-danger">*</span></label>
                                <input name="link" wire:model="link"
                                    class="form-control link @error('link') is-invalid @enderror" type="text"
                                    value="" placeholder="Enter link" required>

                                @error('link')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Slider Image <span class="text-danger"></span></label>
                                <input name="new_image" id="new_image" wire:model="new_image"
                                    class="form-control new_image @error('new_image') is-invalid @enderror" type="file">
                                @if ($new_image)
                                    <img src="{{ $new_image->temporaryUrl() }}" width="100" alt="product image" />
                                @else
                                    <img src="{{ asset('frontend-assets/imgs/sliders') }}/{{ $old_image }}"
                                        width="80" height="80" alt="{{ $title }}">
                                @endif
                                {{-- <img id="product_image_preview" src="uploads/{{ $image ? $image : old('image') }}"
                                    class="img-fluid" width="16" height="16" alt=""> --}}
                                @error('new_image')
                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                @enderror
                            </div>
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
            $('#editModal').on('shown.bs.modal', function(e) {

            });
        });
        $('#editModal').modal({
    backdrop: 'static',
    keyboard: false
})
        // product_image.onchange = evt => {
        //     const [file] = product_image.files
        //     if (file) {
        //         product_image_preview.src = URL.createObjectURL(file)
        //     }
        // }
    </script>
@endpush
