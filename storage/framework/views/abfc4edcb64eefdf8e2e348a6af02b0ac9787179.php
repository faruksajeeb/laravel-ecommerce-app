 <?php $__env->slot('title', null, []); ?> 
    Products
 <?php $__env->endSlot(); ?>

<div class="container-fluid py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 pb-3 border-bottom">
        <div>
            <h2 class="h4 mb-1 fw-bold text-dark">
                <i class="fa-solid fa-boxes-stacked me-2 text-primary"></i> Products Catalogue
            </h2>
            <p class="text-muted small mb-0">Manage master inventory entries, category mappings, and toggle commercial display channels.</p>
        </div>
        <div class="d-flex flex-wrap gap-2 w-100 w-md-auto justify-content-md-end">
            <button type="button" class="btn btn-outline-primary px-3 d-inline-flex align-items-center gap-2"
                data-bs-toggle="modal" data-bs-target="#addModal" wire:click="resetInputFields()">
                <i class="fa-solid fa-plus"></i> <span>Create New</span>
            </button>
            <button class="btn btn-success px-3 d-inline-flex align-items-center gap-2 text-white" wire:click.prevent="render('excelExport')">
                <i class="fa-solid fa-download"></i> <span>Export Excel</span>
            </button>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
            <div class="row g-3">
                <div class="col-xl-3 col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass text-secondary"></i></span>
                        <input class="form-control bg-light border-start-0 ps-0" type="text" placeholder="Search product name or SKU..." wire:model="searchTerm">
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <select wire:model='status' class="form-select bg-light">
                        <option value="">All Statuses</option>
                        <option value="1">Active Only</option>
                        <option value="-1">Inactive Only</option>
                    </select>
                </div>
                <div class="col-xl-2 col-md-4">
                    <div wire:ignore>
                        <select id="search_category_id" wire:model='search_category_id' class="form-select select2">
                            <option value="">All Categories</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div wire:ignore>
                        <select id="search_brand_id" wire:model='search_brand_id' class="form-select select2">
                            <option value="">All Brands</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <select wire:model='orderBy' class="form-select bg-light">
                        <option value="">Order Field</option>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($col); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $col))); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <select wire:model='sortBy' class="form-select bg-light">
                        <option value="">Sort Direction</option>
                        <option value="DESC">Descending</option>
                        <option value="ASC">Ascending</option>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2 mt-3 pt-3 border-top text-secondary small">
                <span class="fw-medium text-dark">Show entries:</span>
                <select class="form-select form-select-sm bg-light w-auto py-0 px-4" wire:model='pazeSize' style="height: 28px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="100">100</option>
                </select>
                <span class="ms-auto text-muted bg-light px-2 py-1 rounded">Viewing Page: <strong class="text-dark"><?php echo e($products->currentPage()); ?></strong></span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 custom-table">
                    <thead class="table-light border-bottom text-uppercase tracking-wider text-secondary small">
                        <tr>
                            <th class="ps-4 py-3" style="width: 70px;">Sl.</th>
                            <th style="width: 80px;">Preview</th>
                            <th>Product Details</th>
                            <th>Categories Hierarchy</th>
                            <th style="width: 160px;">Brand</th>
                            <th style="width: 200px;">Tags</th>
                            <th class="text-center" style="width: 110px;">Status</th>
                            <th>Timestamps</th>
                            <th class="text-end pe-4" style="width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0 text-dark">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="ps-4 text-secondary font-monospace"><?php echo e($key + $products->firstItem()); ?></td>
                                <td>
                                    <?php
                                        $file = 'product-image-avatar.png';
                                        if (($val->image != '' || $val->image != null) && file_exists(public_path('/frontend-assets/imgs/products/' . $val->image))) {
                                            $file = $val->image;
                                        }
                                    ?>
                                    <div class="p-1 bg-light border rounded d-inline-block">
                                        <img src="<?php echo e(asset('frontend-assets/imgs/products/' . $file)); ?>" 
                                             alt="<?php echo e($val->name); ?>" 
                                             class="rounded object-fit-cover" 
                                             width="44" height="44">
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark d-block mb-0"><?php echo e($val->name); ?></span>
                                    <small class="text-muted text-xs font-monospace"><?php echo e($val->slug); ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium px-2 py-1 small mb-1 d-inline-block">
                                        <?php echo e($val->category ? $val->category->name : 'Unassigned'); ?>

                                    </span>
                                    <?php if($val->subcategory): ?>
                                        <i class="fa-solid fa-angle-right mx-1 text-muted text-xs"></i>
                                        <small class="text-secondary"><?php echo e($val->subcategory->subcategory_name); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($val->brand): ?>
                                        <span class="fw-semibold text-dark d-block"><?php echo e($val->brand->name); ?></span>
                                        <small class="text-muted text-xs"><?php echo e($val->brand->slug); ?></small>
                                    <?php else: ?>
                                        <span class="text-muted small">—</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($val->tags && $val->tags->isNotEmpty()): ?>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php $__currentLoopData = $val->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge bg-info bg-opacity-10 text-info border fw-medium px-2 py-0.5 small"><?php echo e($tag->option_value); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted small">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-switch d-inline-block me-0">
                                        <input class="form-check-input active_inactive_btn" 
                                            status="<?php echo e($val->status); ?>" 
                                            table="products" type="checkbox" id="row_<?php echo e($val->id); ?>"
                                            value="<?php echo e(Crypt::encryptString($val->id)); ?>"
                                            <?php echo e($val->status == 1 ? 'checked' : ''); ?> style="cursor:pointer">
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        <span class="d-block" title="Created date"><i class="fa-regular fa-clock text-muted me-1"></i><?php echo e($val->created_at->format('Y-m-d H:i')); ?></span>
                                        <span class="d-block text-xs text-muted" title="Last update"><i class="fa-solid fa-pen-rotate-left me-1"></i><?php echo e($val->updated_at->diffForHumans()); ?></span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group rounded-3 shadow-sm border overflow-hidden">
                                        <button class="btn btn-white btn-sm px-3 border-0 border-end" 
                                            wire:click.prevent="edit('<?php echo e(Crypt::encryptString($val->id)); ?>')"
                                            data-bs-toggle="modal" data-bs-target="#editModal" title="Edit Item">
                                            <i class="fa-solid fa-file-pen text-primary"></i>
                                        </button>
                                        <button class="btn btn-white btn-sm px-3 border-0 del_btn" 
                                            wire:click.prevent="$emit('triggerDelete','<?php echo e(Crypt::encryptString($val->id)); ?>')" 
                                            title="Delete Item">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-4 px-4" wire:key="$products->id">
            <div class="row align-items-center g-3">
                <div class="col-md-6 order-2 order-md-1">
                    <?php echo e($products->links()); ?>

                </div>
                <div class="col-md-6 text-md-end text-center order-1 order-md-2">
                    <p class="text-muted small mb-0">
                        Showing <span class="fw-bold text-dark"><?php echo e($products->firstItem()); ?></span> to 
                        <span class="fw-bold text-dark"><?php echo e($products->lastItem()); ?></span> of 
                        <span class="fw-bold text-dark"><?php echo e($products->total()); ?></span> global assets listed.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('livewire.backend.product.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.backend.product.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search_category_id').select2();
            $('#search_category_id').on('change', function(e) {
                var data = $('#search_category_id').select2("val");
                Livewire.emit('listenerReferenceHere', data);
                window.livewire.find('<?php echo e($_instance->id); ?>').set('search_category_id', data);
            });
            $('#search_brand_id').select2();
            $('#search_brand_id').on('change', function(e) {
                var data = $('#search_brand_id').select2("val");
                window.livewire.find('<?php echo e($_instance->id); ?>').set('search_brand_id', data);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.find('<?php echo e($_instance->id); ?>').on('triggerDelete', deleteId => {
                Swal.fire({
                    title: 'Delete confirmation?',
                    text: 'This permanent administrative operation cannot be reversed!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Delete Record'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('destroy', deleteId)
                    } else {
                        Swal.fire({
                            title: 'Operation aborted',
                            text: 'Your production dataset matches are intact.',
                            icon: 'info'
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/backend/product/index.blade.php ENDPATH**/ ?>