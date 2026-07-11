<?php $__env->startPush('styles'); ?>
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
        #editModal .modal-body {
            max-height: calc(100vh - 210px) !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            -webkit-overflow-scrolling: touch;
        }

        #editModal .modal-content {
            max-height: calc(100vh - 2rem) !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header px-4 py-3 bg-white border-bottom-0">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="fa-solid fa-pen-to-square text-warning fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold" id="editProductModalLabel">Edit Product</h5>
                        <p class="text-muted small mb-0">Update the details for this product in your catalog.</p>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="resetInputFields()"></button>
            </div>

            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body px-4 pb-4">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            Please review the highlighted fields and try again.
                        </div>
                    <?php endif; ?>

                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="p-3 border rounded-4 mb-4">
                                <span class="section-title">General Information</span>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model.live="name" wire:keyup="generateSlug"
                                            class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Enter product name...">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Slug (Auto-generated)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fa-solid fa-link"></i></span>
                                            <input type="text" wire:model="slug" class="form-control bg-light" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Category <span
                                                class="text-danger">*</span></label>
                                        <select wire:model.live="SelectedCategory"
                                            class="form-select <?php $__errorArgs = ['SelectedCategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Choose Category</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Subcategory</label>
                                        <select wire:model.live="subcategory_id" class="form-select"
                                            <?php echo e(is_null($SelectedCategory) ? 'disabled' : ''); ?>>
                                            <option value="">Choose Subcategory</option>
                                            <?php if($subcategories): ?>
                                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->subcategory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
                                        <label class="form-label fw-semibold">Regular Price ($) <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="regular_price"
                                            class="form-control <?php $__errorArgs = ['regular_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
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
                                        <?php $__empty_1 = true; $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr wire:key="variation-<?php echo e($index); ?>">
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.<?php echo e($index); ?>.size">
                                                        <option value="">Select Size</option>
                                                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($sz); ?>"><?php echo e($sz); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($variation['size']) && !in_array($variation['size'], $sizes)): ?>
                                                            <option value="<?php echo e($variation['size']); ?>"><?php echo e($variation['size']); ?> (custom)</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.<?php echo e($index); ?>.color">
                                                        <option value="">Select Color</option>
                                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cl); ?>"><?php echo e($cl); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($variation['color']) && !in_array($variation['color'], $colors)): ?>
                                                            <option value="<?php echo e($variation['color']); ?>"><?php echo e($variation['color']); ?> (custom)</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" min="0" class="form-control"
                                                        wire:model="variations.<?php echo e($index); ?>.quantity">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        wire:model="variations.<?php echo e($index); ?>.sku">
                                                </td>
                                                <td>
                                                    <select class="form-select"
                                                        wire:model="variations.<?php echo e($index); ?>.stock_status">
                                                        <option value="instock">In Stock</option>
                                                        <option value="outofstock">Out of Stock</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger"
                                                        wire:click.prevent="removeVariation(<?php echo e($index); ?>)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No variations
                                                    added. Add a variation (size/color can be left blank for a
                                                    single-SKU product) to manage stock.</td>
                                            </tr>
                                        <?php endif; ?>
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
                                        onclick="document.getElementById('editMainImage').click()">
                                        <i class="fa-solid fa-cloud-arrow-up fs-2 text-muted mb-2"></i>
                                        <p class="mb-0 small">Click to upload main image</p>
                                        <input type="file" id="editMainImage" wire:model="newImage" class="d-none">
                                    </div>
                                    <?php if($newImage): ?>
                                        <div class="preview-card shadow-sm"><img src="<?php echo e($newImage->temporaryUrl()); ?>"></div>
                                    <?php elseif($oldImage): ?>
                                        <div class="preview-card shadow-sm"><img src="<?php echo e(asset('frontend-assets/imgs/products/' . $oldImage)); ?>" alt="<?php echo e($name); ?>"></div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary small">Media Carousel Gallery</label>
                                    <div class="custom-file-upload mb-2"
                                        onclick="document.getElementById('editGalleryImages').click()">
                                        <i class="fa-solid fa-images fs-2 text-muted mb-2"></i>
                                        <p class="mb-0 small">Click to upload multiple images</p>
                                        <input type="file" id="editGalleryImages" wire:model="newImages" multiple
                                            class="d-none">
                                    </div>

                                    <div wire:loading wire:target="newImages" class="text-primary small mb-2">
                                        <i class="fa-solid fa-spinner fa-spin me-1"></i> Processing gallery assets...
                                    </div>

                                    <?php if(!empty($newImages) && is_array($newImages)): ?>
                                        <div class="d-flex flex-wrap gap-2 image-preview-container mt-2">
                                            <?php $__currentLoopData = $newImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $imgFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="preview-card shadow-sm" wire:key="edit-gallery-preview-<?php echo e($index); ?>">
                                                    <?php if(method_exists($imgFile, 'temporaryUrl')): ?>
                                                        <img src="<?php echo e($imgFile->temporaryUrl()); ?>" width="90" height="90"
                                                            class="img-thumbnail" alt="gallery item preview" />
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php elseif(!empty($oldImages)): ?>
                                        <div class="d-flex flex-wrap gap-2 image-preview-container mt-2">
                                            <?php $__currentLoopData = $oldImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $oldImgFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($oldImgFile): ?>
                                                    <div class="preview-card shadow-sm" wire:key="edit-old-gallery-<?php echo e($index); ?>">
                                                        <img src="<?php echo e(asset('frontend-assets/imgs/products/' . $oldImgFile)); ?>" width="90"
                                                            height="90" class="img-thumbnail" alt="gallery item preview" />
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
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
                                    <textarea id="editor-edit" wire:model="description" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top-0 rounded-bottom-4">
                    <button type="button" class="btn btn-link text-decoration-none text-muted fw-semibold me-auto"
                        data-bs-dismiss="modal" wire:click="resetInputFields()">Cancel</button>
                    <button type="button" class="btn btn-outline-warning px-4 fw-semibold"
                        wire:click="resetInputFields()"><i class="fa-solid fa-arrow-rotate-left me-2"></i>Reset</button>
                    <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm"
                        <?php echo e(isset($flag) && $flag == 1 ? 'disabled' : ''); ?>>
                        <i class="fa-solid fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        let editEditorInstance = null;

        function initEditProductEditor() {
            const editorElement = document.getElementById('editor-edit');
            if (!editorElement || typeof ClassicEditor === 'undefined') {
                return;
            }

            if (editEditorInstance) {
                editEditorInstance.destroy().catch(() => {});
            }

            ClassicEditor
                .create(editorElement)
                .then(editor => {
                    editEditorInstance = editor;
                    editor.model.document.on('change:data', () => {
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('description', editor.getData());
                    });
                })
                .catch(error => {
                    console.error('Edit CKEditor init failed:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', initEditProductEditor);
        document.addEventListener('livewire:load', initEditProductEditor);
        document.addEventListener('shown.bs.modal', function (event) {
            if (event.target.id === 'editModal') {
                setTimeout(initEditProductEditor, 200);
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\backend\product\edit.blade.php ENDPATH**/ ?>