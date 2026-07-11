 <?php $__env->slot('title', null, []); ?> 
    Categories
 <?php $__env->endSlot(); ?>

<div>
    <section class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <h5 class="card-title mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-tags text-primary"></i>
                        <span>Categories Manager</span>
                    </h5>
                    
                    <div class="d-flex gap-2 justify-content-start justify-content-md-end flex-wrap">
                        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#addModal" wire:click="resetInputFields()">
                            <i class="fa-solid fa-plus"></i> Create New
                        </button>
                        
                        <button type="button" class="btn btn-sm btn-success d-inline-flex align-items-center gap-2" 
                                wire:click.prevent="render('excelExport')">
                            <i class="fa-solid fa-download"></i> Export
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row g-3 mb-4 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label text-muted small fw-bold">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" 
                                   placeholder="Search categories..." wire:model.live="searchTerm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-muted small fw-bold">Status</label>
                        <select wire:model.live="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="1">Active</option>
                            <option value="-1">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-bold">Order By</label>
                        <select wire:model.live="orderBy" class="form-select">
                            <option value="">Default Column</option>
                            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($col); ?>"><?php echo e(ucwords(str_replace('_', ' ', $col))); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-bold">Sort Direction</label>
                        <select wire:model.live="sortBy" class="form-select">
                            <option value="">Default Sort</option>
                            <option value="DESC">Descending</option>
                            <option value="ASC">Ascending</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between bg-light rounded px-3 py-2 mb-3 text-muted small">
                    <div class="d-flex align-items-center gap-2">
                        <span>Show</span>
                        <select class="form-select form-select-sm w-auto py-0" wire:model.live="pazeSize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="100">100</option>
                        </select>
                        <span>entries</span>
                    </div>
                    <div>
                        <span>Current Page: <strong><?php echo e($categories->currentPage()); ?></strong></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th style="width: 60px;">Sl.</th>
                                <th style="width: 80px;">Image</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th style="width: 120px;">Is Popular</th>
                                <th style="width: 100px;">Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 120px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key + $categories->firstItem()); ?></td>
                                    <td>
                                        <?php if($val->image): ?>
                                            <img src="<?php echo e(asset('frontend-assets/imgs/categories/' . $val->image)); ?>" 
                                                 alt="<?php echo e($val->name); ?>" 
                                                 class="img-thumbnail rounded-circle" 
                                                 style="width: 45px; height: 45px; object-fit: cover;" />
                                        <?php else: ?>
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-muted" 
                                                 style="width: 45px; height: 45px;">
                                                <i class="fa-solid fa-image fa-sm"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="fw-semibold text-dark"><?php echo e($val->name); ?></td>
                                    <td class="text-muted small"><?php echo e(str_replace('_', ' ', $val->slug)); ?></td>
                                    <td>
                                        <?php if($val->is_popular == 1): ?>
                                            <span class="badge bg-success-subtle text-success px-2 py-1.5 rounded">Yes</span>
                                        <?php else: ?>
                                            <span class="badge bg-light text-secondary px-2 py-1.5 rounded">No</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input active_inactive_btn" 
                                                   type="checkbox" 
                                                   role="switch"
                                                   id="row_<?php echo e($val->id); ?>"
                                                   data-status="<?php echo e($val->status); ?>"
                                                   data-table="categories"
                                                   value="<?php echo e(Crypt::encryptString($val->id)); ?>"
                                                   <?php echo e($val->status == 1 ? 'checked' : ''); ?>

                                                   style="cursor: pointer;">
                                        </div>
                                    </td>
                                    <td class="text-muted small"><?php echo e($val->created_at); ?></td>
                                    <td class="text-muted small"><?php echo e($val->updated_at); ?></td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button class="btn btn-sm btn-outline-success"
                                                    wire:click.prevent="edit('<?php echo e(Crypt::encryptString($val->id)); ?>')"
                                                    data-bs-toggle="modal" data-bs-target="#editModal" 
                                                    title="Edit">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </button>

                                            <button class="btn btn-sm btn-outline-danger"
                                                    wire:click.prevent="$dispatch('triggerDelete', '<?php echo e(Crypt::encryptString($val->id)); ?>')"
                                                    title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-5">
                                        <i class="fa-regular fa-folder-open fa-2xl d-block mb-3 text-black-50"></i>
                                        No categories found matching your criteria.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white border-top py-3">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <?php echo e($categories->links()); ?>

                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        <p class="mb-0">
                            <?php echo e(__('Showing')); ?> <span class="fw-semibold text-dark"><?php echo e($categories->firstItem()); ?></span>
                            <?php echo e(__('to')); ?> <span class="fw-semibold text-dark"><?php echo e($categories->lastItem()); ?></span>
                            <?php echo e(__('of')); ?> <span class="fw-semibold text-dark"><?php echo e($categories->total()); ?></span> <?php echo e(__('results')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('livewire.backend.category.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.backend.category.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            // Check if select2 container is present before initializing
            if($('#name').length) {
                $('#name').select2({
                    width: '100%'
                });
                $('#name').on('change', function(e) {
                    var data = $('#name').select2("val");
                    if(typeof Livewire.emit !== "undefined") {
                        Livewire.emit('listenerReferenceHere', data);
                    }
                    window.livewire.find('<?php echo e($_instance->id); ?>').set('name', data);
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const handleConfirmDelete = (deleteId) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This category entry will be completely removed!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed || result.value) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('destroy', deleteId);
                    }
                });
            };

            // Hybrid compatibility listener for older Livewire v2 ($emit) and Livewire v3 ($dispatch)
            if (typeof Livewire !== 'undefined' && Livewire.on) {
                Livewire.on('triggerDelete', deleteId => handleConfirmDelete(deleteId));
            } else {
                window.addEventListener('triggerDelete', event => handleConfirmDelete(event.detail));
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/backend/category/index.blade.php ENDPATH**/ ?>