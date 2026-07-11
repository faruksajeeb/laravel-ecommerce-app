@push('styles')
    <style>
        /* Modal depth and shape */
        .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Section headers */
        .section-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            color: var(--bs-primary);
            border-bottom: 2px solid var(--bs-primary);
            display: inline-block;
            margin-bottom: 1.5rem;
        }

        /* Modern File Upload Input */
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

        /* Image Preview Cards */
        .preview-card {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid #dee2e6;
        }

        .preview-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* CKEditor Z-index fix */
        .ck-editor__animated-bottom {
            z-index: 1060 !important;
        }

        /* Force layout engine to allow vertical page flow when modal is open */
        body.modal-open,
        .modal-open .wrapper,
        .modal-open main {
            overflow: visible !important;
            height: auto !important;
        }

        /* Target the inner container body of the product popup wrapper */
        #addModal .modal-body {
            max-height: calc(100vh - 210px) !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            -webkit-overflow-scrolling: touch;
        }
    </style>
@endpush

<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header px-4 py-3 bg-white border-bottom-0">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="fa-solid fa-box-open text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold" id="productModalLabel">Create New Product</h5>
                        <p class="text-muted small mb-0">Fill in the details to add a new item to your catalog.</p>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="resetInputFields()"></button>
            </div>

            <form wire:submit.prevent="store" class="needs-validation">
                <div class="modal-body px-4 pb-4">

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            Please review the highlighted fields and try again.
                        </div>
                    @endif

                    <div class="row g-4">

                        <div class="col-lg-12">

                            <div class="p-3 border rounded-4 mb-4">
                                <span class="section-title">General Information</span>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model.live="name" wire:keyup="generateSlug"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Enter product name...">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Slug (Auto-generated)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i
                                                    class="fa-solid fa-link"></i></span>
                                            <input type="text" wire:model="slug" class="form-control bg-light"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Category <span
                                                class="text-danger">*</span></label>
                                        <select wire:model.live="SelectedCategory"
                                            class="form-select @error('SelectedCategory') is-invalid @enderror">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Subcategory</label>
                                        <select wire:model.live="subcategory_id" class="form-select"
                                            {{ is_null($SelectedCategory) ? 'disabled' : '' }}>
                                            <option value="">Choose Subcategory</option>
                                            @if ($subcategories)
                                                @foreach ($subcategories as $sub)
                                                    <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Featured</label>
                                        <select wire:model="featured" class="form-select">
                                            <option value="0">No, Standard</option>
                                            <option value="1">Yes, Featured</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 border rounded-4">
                                <span class="section-title">Pricing</span>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Regular Price ($) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model="regular_price"
                                            class="form-control @error('regular_price') is-invalid @enderror"
                                            placeholder="0.00">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Sale Price ($)</label>
                                        <input type="text" wire:model="sale_price"
                                            class="form-control border-primary bg-primary bg-opacity-10 text-primary fw-bold"
                                            placeholder="0.00">
                                    </div>
                                </div>
                                <small class="text-muted mt-2 d-block">SKU, quantity and stock status are managed per
                                    size/color in the Variations &amp; Stock section below.</small>
                            </div>
                        </div>

                        <div class="p-3 border rounded-4 mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="section-title mb-0">Variations & Stock</span>
                                <button type="button" class="btn btn-sm btn-outline-primary"
                                    wire:click.prevent="addVariation()">
                                    <i class="fa-solid fa-plus me-1"></i> Add Variation
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th style="width:110px;">Quantity</th>
                                            <th style="width:130px;">SKU</th>
                                            <th style="width:140px;">Stock Status</th>
                                            <th style="width:40px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($variations as $index => $variation)
                                            <tr wire:key="variation-{{ $index }}">
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.{{ $index }}.size">
                                                        <option value="">Select Size</option>
                                                        @foreach ($sizes as $sz)
                                                            <option value="{{ $sz }}">{{ $sz }}</option>
                                                        @endforeach
                                                        @if (!empty($variation['size']) && !in_array($variation['size'], $sizes))
                                                            <option value="{{ $variation['size'] }}">{{ $variation['size'] }} (custom)</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.{{ $index }}.color">
                                                        <option value="">Select Color</option>
                                                        @foreach ($colors as $cl)
                                                            <option value="{{ $cl }}">{{ $cl }}</option>
                                                        @endforeach
                                                        @if (!empty($variation['color']) && !in_array($variation['color'], $colors))
                                                            <option value="{{ $variation['color'] }}">{{ $variation['color'] }} (custom)</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" min="0" class="form-control"
                                                        wire:model="variations.{{ $index }}.quantity">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        wire:model="variations.{{ $index }}.sku">
                                                </td>
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.{{ $index }}.stock_status">
                                                        <option value="instock">In Stock</option>
                                                        <option value="outofstock">Out of Stock</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger"
                                                        wire:click.prevent="removeVariation({{ $index }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No variations
                                                    added. Add a variation (size/color can be left blank for a
                                                    single-SKU product) to manage stock.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <small class="text-muted">Each unique size + color combination tracks its own stock.
                                Product "Quantity" is updated automatically as the total of all
                                variations.</small>
                        </div>

                        <div class="col-lg-12">

                            <div class="p-3 border rounded-4 mb-4">
                                <span class="section-title">Product Media</span>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Main Thumbnail</label>
                                    <div class="custom-file-upload mb-2"
                                        onclick="document.getElementById('mainImage').click()">
                                        <i class="fa-solid fa-cloud-arrow-up fs-2 text-muted mb-2"></i>
                                        <p class="mb-0 small">Click to upload main image</p>
                                        <input type="file" id="mainImage" wire:model="image" class="d-none">
                                    </div>
                                    @if ($image)
                                        <div class="preview-card shadow-sm"><img src="{{ $image->temporaryUrl() }}">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary small">Media Carousel
                                        Gallery</label>

                                    <div class="custom-file-upload mb-2"
                                        onclick="document.getElementById('galleryImages').click()">
                                        <i class="fa-solid fa-images fs-2 text-muted mb-2"></i>
                                        <p class="mb-0 small">Click to upload multiple images</p>
                                        <input type="file" id="galleryImages" wire:model="images" multiple
                                            class="d-none">
                                    </div>

                                    <div wire:loading wire:target="images" class="text-primary small mb-2">
                                        <i class="fa-solid fa-spinner fa-spin me-1"></i> Processing gallery assets...
                                    </div>

                                    @if (!empty($images) && is_array($images))
                                        <div class="d-flex flex-wrap gap-2 image-preview-container mt-2">
                                            @foreach ($images as $index => $imgFile)
                                                <div class="preview-card shadow-sm"
                                                    wire:key="gallery-preview-{{ $index }}">
                                                    @if (method_exists($imgFile, 'temporaryUrl'))
                                                        <img src="{{ $imgFile->temporaryUrl() }}" width="90"
                                                            height="90" class="img-thumbnail"
                                                            alt="gallery item preview" />
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="p-3 border rounded-4">
                                <span class="section-title">Summary</span>
                                <textarea wire:model="short_description" class="form-control" rows="4"
                                    placeholder="Brief overview for search results..."></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-3 border rounded-4">
                                <span class="section-title">Full Product Description</span>
                                <div wire:ignore>
                                    <textarea id="editor" wire:model="description" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top-0 rounded-bottom-4">
                    <button type="button" class="btn btn-link text-decoration-none text-muted fw-semibold me-auto"
                        data-bs-dismiss="modal" wire:click="resetInputFields()">Cancel</button>
                    <button type="button" class="btn btn-outline-warning px-4 fw-semibold"
                        wire:click="resetInputFields()"><i
                            class="fa-solid fa-arrow-rotate-left me-2"></i>Reset</button>
                    <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm"
                        {{ isset($flag) && $flag == 1 ? 'disabled' : '' }}>
                        <i class="fa-solid fa-save me-2"></i>Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let editorInstance = null;

        function initProductEditor() {
            const editorElement = document.getElementById('editor');
            if (!editorElement || typeof ClassicEditor === 'undefined') {
                return;
            }

            if (editorInstance) {
                editorInstance.destroy().catch(() => {});
            }

            ClassicEditor
                .create(editorElement)
                .then(editor => {
                    editorInstance = editor;
                    editor.model.document.on('change:data', () => {
                        if (window.Livewire) {
                            window.Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('description', editor.getData());
                        }
                    });
                })
                .catch(error => {
                    console.error('CKEditor init failed:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', initProductEditor);
        document.addEventListener('livewire:load', initProductEditor);
        document.addEventListener('shown.bs.modal', function (event) {
            if (event.target.id === 'addModal') {
                setTimeout(initProductEditor, 200);
            }
        });

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('product-saved', (type, message) => {
                const icon = type === 'success' ? 'success' : 'error';
                const title = type === 'success' ? 'Success' : 'Error';

                Swal.fire({
                    icon: icon,
                    title: title,
                    text: message,
                    timer: 2200,
                    showConfirmButton: false,
                });

                if (type === 'success') {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
                    if (modal) {
                        modal.hide();
                    }
                }
            });
        });
    </script>
@endpush
