<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Roles Management
     <?php $__env->endSlot(); ?>

    <?php $__env->startPush('styles'); ?>
        <style>
            .card-custom {
                border: none;
                border-radius: 12px;
            }
            .table-responsive {
                border-radius: 8px;
                overflow: hidden;
            }
            /* Customizing individual accordion overrides within tables */
            .table-accordion .accordion-button {
                padding: 0.5rem 0.75rem;
                font-size: 0.85rem;
                font-weight: 600;
                background-color: #f8f9fa;
                color: #495057;
                border-radius: 6px !important;
            }
            .table-accordion .accordion-button:not(.collapsed) {
                background-color: #e8f0fe;
                color: #1a73e8;
                box-shadow: none;
            }
            .table-accordion .accordion-body {
                padding: 0.75rem;
                background-color: #fff;
                max-height: 200px;
                overflow-y: auto;
            }
            .cursor-pointer {
                cursor: pointer;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom shadow-sm">
                    
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="row align-items-center g-2">
                            <div class="col-md-6">
                                <h4 class="card-title m-0 fw-bold text-dark">
                                    <i class="fa-solid fa-shield-halved text-primary me-2"></i>Roles Configuration
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb" class="float-md-end">
                                    <ol class="breadcrumb m-0 small bg-light px-3 py-2 rounded-pill">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        
                        <form action="" method="GET" class="mb-4 bg-light p-3 rounded-3 border border-light-subtle">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3 align-items-center">
                                <div class="col-xl-3 col-md-4">
                                    <select name="search_status" class="form-select shadow-sm" id="search_status">
                                        <option value="">All Statuses</option>
                                        <option value="7" <?php echo e(request('search_status') == '7' ? 'selected' : ''); ?>>Active</option>
                                        <option value="-7" <?php echo e(request('search_status') == '-7' ? 'selected' : ''); ?>>Inactive</option>
                                        <option value="-1" <?php echo e(request('search_status') == '-1' ? 'selected' : ''); ?>>Deleted</option>
                                    </select>
                                </div>
                                
                                <div class="col-xl-5 col-md-8">
                                    <div class="input-group shadow-sm">
                                        <input type="text" name="search_text" value="<?php echo e(request('search_text')); ?>" class="form-control" placeholder="Search roles by title...">
                                        <button class="btn btn-primary px-3" type="submit" name="submit_btn" value="search">
                                            <i class="fa fa-search me-1"></i> Search
                                        </button>
                                        <button class="btn btn-outline-success" type="submit" name="submit_btn" value="export">
                                            <i class="fa-solid fa-download me-1"></i> Export
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-12 d-flex gap-2 justify-content-xl-end justify-content-start">
                                    <a href="<?php echo e(route('clear-permission-cache')); ?>" class="btn btn-light border shadow-sm text-nowrap">
                                        <i class="fa-solid fa-rotate me-1"></i> Clear Cache
                                    </a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                        <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-success shadow-sm text-nowrap ms-auto ms-xl-0">
                                            <i class="fa-solid fa-plus me-1"></i> Create New Role
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive border shadow-sm rounded-3">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-secondary border-bottom">
                                    <tr>
                                        <th class="ps-3" width="7%">Sl No.</th>
                                        <th width="15%">Role Title</th>
                                        <th width="35%">Assigned Permissions Matrix</th>
                                        <th width="13%">Guard Name</th>
                                        <th width="10%">Created At</th>
                                        <th width="10%">Updated At</th>
                                        <th class="text-end pe-3" width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="ps-3 fw-semibold text-muted"><?php echo e($key + 1); ?></td>
                                            <td>
                                                <span class="fw-bold text-dark"><?php echo e($val->name); ?></span>
                                            </td>
                                            <td>
                                                <div class="accordion table-accordion" id="accordionPermissions-<?php echo e($val->id); ?>">
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header" id="heading-<?php echo e($val->id); ?>">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                                                data-bs-target="#collapse-<?php echo e($val->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($val->id); ?>">
                                                                <i class="fa-solid fa-shield me-2 text-muted"></i> View Permissions (<?php echo e($val->permissions->count()); ?>)
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-<?php echo e($val->id); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo e($val->id); ?>" data-bs-parent="#accordionPermissions-<?php echo e($val->id); ?>">
                                                            <div class="accordion-body border border-top-0 rounded-bottom-2">
                                                                <?php if($val->permissions->count() > 0): ?>
                                                                    <div class="d-flex flex-wrap gap-1">
                                                                        <?php $__currentLoopData = $val->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded">
                                                                                <?php echo e($permission->name); ?>

                                                                            </span>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <span class="text-muted small italic">No explicit individual overrides attached.</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><code class="text-secondary small"><?php echo e($val->guard_name); ?></code></td>
                                            <td class="small text-muted"><?php echo e($val->created_at ? $val->created_at->format('Y-m-d H:i') : 'N/A'); ?></td>
                                            <td class="small text-muted"><?php echo e($val->updated_at ? $val->updated_at->format('Y-m-d H:i') : 'N/A'); ?></td>
                                            <td class="text-end pe-3">
                                                <div class="d-inline-flex gap-1">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.edit')): ?>
                                                        <a href="<?php echo e(route('roles.edit', Crypt::encryptString($val->id))); ?>" class="btn btn-sm btn-outline-warning" title="Edit Role">
                                                            <i class="fa-solid fa-pencil"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.delete')): ?>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Remove Role"
                                                            onclick="if(confirm('Are you absolutely sure you want to delete this role?')) { event.preventDefault(); document.getElementById('delete-form-<?php echo e($val->id); ?>').submit(); }">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                        
                                                        <form id="delete-form-<?php echo e($val->id); ?>" action="<?php echo e(route('roles.destroy', Crypt::encryptString($val->id))); ?>" method="POST" class="d-none">
                                                            <?php echo method_field('DELETE'); ?>
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">
                                                <i class="fa-solid fa-folder-open display-6 d-block mb-2 text-black-50"></i>
                                                No records found matching criteria.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if($roles->hasPages()): ?>
                            <div class="mt-4 d-flex justify-content-end">
                                <?php echo e($roles->links()); ?>

                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\roles\index.blade.php ENDPATH**/ ?>