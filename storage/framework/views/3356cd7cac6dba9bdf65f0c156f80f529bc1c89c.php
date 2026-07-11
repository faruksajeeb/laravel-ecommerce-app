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
        Create Role
     <?php $__env->endSlot(); ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom">
        <div class="mb-3 mb-md-0">
            <h4 class="text-dark fw-bold mb-1">
                <i class="fa fa-shield-alt text-primary me-2"></i>Create New Role
            </h4>
            <p class="text-muted small mb-0">Define permissions and control access levels for your platform.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent py-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('roles')); ?>" class="text-decoration-none link-secondary">Roles</a></li>
                <li class="breadcrumb-item active text-primary fw-medium" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>

    <form action="<?php echo e(route('roles.store')); ?>" method="POST" id="roleCreateForm">
        <?php echo csrf_field(); ?>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border border-light-subtle shadow-sm rounded-4 p-4 sticky-lg-top" style="top: 1.5rem; z-index: 10;">
                    <h5 class="text-dark fw-bold mb-3 fs-6">Role Properties</h5>
                    
                    <div class="mb-4">
                        <label for="role_name" class="form-label fw-semibold text-secondary small">ROLE NAME</label>
                        <input type="text" name="name" id="role_name" class="form-control form-control-lg border-2 shadow-none fs-6 px-3" placeholder="e.g. Content Manager" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 py-2.5 fs-6 fw-semibold shadow-sm rounded-3">
                        <i class="fa fa-save me-2"></i>Save Role Configuration
                    </button>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border border-light-subtle shadow-sm rounded-4 overflow-hidden">
                    
                    <div class="card-header bg-light bg-opacity-50 border-bottom border-light-subtle d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <h6 class="text-dark fw-bold mb-0">System Authorizations</h6>
                            <span class="text-muted small">Toggle individual components or complete groups</span>
                        </div>
                        <div class="form-check form-switch select-all-permission">
                            <input type="checkbox" name="permission_all" id="permission_all" class="form-check-input cursor-pointer">
                            <label class="form-check-label fw-bold text-dark cursor-pointer small" for="permission_all">Grant All</label>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupIndex => $permission_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row g-0 border-bottom border-light-subtle align-items-start permission-group-row">
                                
                                <div class="col-md-4 bg-light bg-opacity-25 p-4 border-end border-light-subtle h-100">
                                    <div class="form-check form-switch group-permission-switch" data-group="<?php echo e($permission_group->group_name); ?>">
                                        <input type="checkbox" name="group-permission[]" id="group_<?php echo e($groupIndex); ?>" class="form-check-input group-input cursor-pointer">
                                        <label class="form-check-label fw-bold text-dark cursor-pointer" for="group_<?php echo e($groupIndex); ?>">
                                            <?php echo e(ucfirst($permission_group->group_name)); ?>

                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 p-3 bg-white">
                                    <?php
                                        $groupWisePermissions = \DB::table('permissions')
                                            ->where('group_name', $permission_group->group_name)
                                            ->get();
                                        $permissinCount = count($groupWisePermissions);
                                    ?>
                                    
                                    <div class="row g-2">
                                        <?php $__currentLoopData = $groupWisePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-6">
                                                <div class="p-2.5 px-3 border border-transparent rounded-3 hover-bg duration-150">
                                                    <div class="form-check single-permission-box" 
                                                         data-group-class="per-<?php echo e($permission_group->group_name); ?>" 
                                                         data-group-name="<?php echo e($permission_group->group_name); ?>" 
                                                         data-count="<?php echo e($permissinCount); ?>">
                                                        
                                                        <input type="checkbox" value="<?php echo e($permission->name); ?>" name="permissions[]" id="permission<?php echo e($permission->id); ?>" class="form-check-input perm-input cursor-pointer">
                                                        <label class="form-check-label text-secondary cursor-pointer fs-7" for="permission<?php echo e($permission->id); ?>">
                                                            <?php echo e(ucwords(str_replace('.', ' ', $permission->name))); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php $__env->startPush('styles'); ?>
    <style>
        .cursor-pointer { cursor: pointer; }
        .hover-bg:hover { 
            background-color: var(--bs-light);
            border-color: var(--bs-light-subtle) !important;
        }
        .duration-150 { transition: all 0.15s ease-in-out; }
        .fs-7 { font-size: 0.875rem; }
        .form-control:focus {
            border-color: var(--bs-primary-border-subtle);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        @media(min-width: 768px) {
            .permission-group-row { display: flex; }
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(function() {
                // 1. "Select/Toggle All" global switcher
                $('.select-all-permission input').on('change', function() {
                    let isChecked = $(this).is(':checked');
                    $(".group-input, .perm-input").prop("checked", isChecked);
                });

                // 2. Module Group Checkbox toggle logic
                $('.group-input').on('change', function() {
                    let isChecked = $(this).is(':checked');
                    let groupName = $(this).closest('.group-permission-switch').data('group');
                    
                    $(`.single-permission-box[data-group-name="${groupName}"] .perm-input`).prop("checked", isChecked);
                    allChecked();
                });

                // 3. Child Individual Permission toggle logic
                $('.perm-input').on('change', function() {
                    let parentBox = $(this).closest('.single-permission-box');
                    let groupName = parentBox.data('group-name');
                    let totalCount = parentBox.data('count');
                    
                    let checkedCount = $(`.single-permission-box[data-group-name="${groupName}"] .perm-input:checked`).length;
                    let groupSwitch = $(`.group-permission-switch[data-group="${groupName}"] .group-input`);

                    groupSwitch.prop("checked", checkedCount === totalCount);
                    allChecked();
                });

                // 4. State synchronization check
                function allChecked() {
                    const totalPermissionsCount = <?php echo e(count($permissions)); ?>;
                    const currentlyCheckedCount = $(".perm-input:checked").length;
                    
                    $('.select-all-permission input').prop("checked", currentlyCheckedCount === totalPermissionsCount);
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\roles\create.blade.php ENDPATH**/ ?>