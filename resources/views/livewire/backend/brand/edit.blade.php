<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-white border-bottom-0">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="fa-solid fa-pen-to-square text-warning fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold" id="editBrandModalLabel">Edit Brand</h5>
                        <p class="text-muted small mb-0">Update the details for this brand.</p>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="resetInputFields()"></button>
            </div>

            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                @csrf
                <div class="modal-body px-4 pb-4">
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            Please review the highlighted fields and try again.
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Brand Name <span class="text-danger">*</span></label>
                        <input type="text" wire:model.live="name" wire:keyup="generateSlug"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Enter brand name...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Slug (Auto-generated)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-link"></i></span>
                            <input type="text" wire:model="slug" class="form-control bg-light" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Logo</label>
                        <div class="custom-file-upload mb-2"
                            onclick="document.getElementById('editBrandLogo').click()">
                            <i class="fa-solid fa-cloud-arrow-up fs-2 text-muted mb-2"></i>
                            <p class="mb-0 small">Click to upload new logo (optional)</p>
                            <input type="file" id="editBrandLogo" wire:model="new_logo" class="d-none">
                        </div>
                        @error('new_logo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @if ($new_logo)
                            <div class="preview-card shadow-sm mt-2"><img src="{{ $new_logo->temporaryUrl() }}"></div>
                        @elseif ($old_logo)
                            <div class="preview-card shadow-sm mt-2"><img src="{{ asset('frontend-assets/imgs/brands/' . $old_logo) }}" alt="Current logo"></div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top-0">
                    <button type="button" class="btn btn-link text-decoration-none text-muted fw-semibold me-auto"
                        data-bs-dismiss="modal" wire:click="resetInputFields()">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm"
                        {{ isset($flag) && $flag == 1 ? 'disabled' : '' }}>
                        <i class="fa-solid fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <style>
        .custom-file-upload {
            border: 2px dashed #dee2e6;
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9fa;
            cursor: pointer;
        }

        .custom-file-upload:hover {
            border-color: var(--bs-primary);
            background: #f1f4ff;
        }

        .preview-card {
            width: 80px;
            height: 80px;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid #dee2e6;
        }

        .preview-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush
