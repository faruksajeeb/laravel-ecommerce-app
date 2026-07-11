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
        Create User
     <?php $__env->endSlot(); ?>

    <?php $__env->startPush('styles'); ?>
        <style>
            .card-custom {
                border: none;
                border-radius: 12px;
            }
            .permission-box {
                max-height: 600px;
                overflow-y: auto;
                border-radius: 8px;
            }
            .permission-list {
                list-style: none;
                padding-left: 0;
                margin-bottom: 0;
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
                                    <i class="fa-solid fa-user-plus text-success me-2"></i>Create New User
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb" class="float-md-end">
                                    <ol class="breadcrumb m-0 small bg-light px-3 py-2 rounded-pill">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('users')); ?>" class="text-decoration-none">Users</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="<?php echo e(route('users.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row g-4">
                                <div class="col-xl-4 col-lg-5">
                                    <div class="p-4 bg-light rounded-3 border border-light-subtle h-100">
                                        <h5 class="fw-bold mb-4 text-secondary pb-2 border-bottom">Account Details</h5>
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold small text-muted">User Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control shadow-sm" placeholder="Enter full name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold small text-muted">User Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control shadow-sm" placeholder="user@example.com" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold small text-muted">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control shadow-sm" placeholder="Minimum 8 characters" required>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold small text-muted">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control shadow-sm" placeholder="Repeat password" required>
                                        </div>

                                        <div class="mb-2">
                                            <label for="roles" class="form-label fw-semibold small text-muted">Assign Roles <span class="text-danger">*</span></label>
                                            <select name="roles[]" class="form-select select2 shadow-sm" multiple required>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>"><?php echo e(ucwords($role->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-7">
                                    <div class="p-4 border border-light-subtle rounded-3 h-100 bg-white">
                                        <div class="mb-3">
                                            <h5 class="fw-bold text-secondary m-0">Direct Permissions Override</h5>
                                            <div class="alert alert-info py-2 px-3 mt-2 border-0 small text-muted rounded-3">
                                                <i class="fa-solid fa-circle-info me-1"></i> The user automatically inherits permissions from their assigned roles. Select items below <strong>only</strong> if you need to grant additional specific permissions.
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                            <span class="fw-semibold text-muted small">Permissions Matrix</span>
                                            
                                            <div class="form-check form-switch select-all-permission">
                                                <input class="form-check-input cursor-pointer" type="checkbox" name="permission_all" id="permission_all">
                                                <label class="form-check-label fw-bold text-primary small cursor-pointer" for="permission_all">Select All</label>
                                            </div>
                                        </div>

                                        <div class="permission-box p-2 bg-light bg-opacity-50 border rounded-3">
                                            <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupIndex => $permission_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row align-items-center py-3 px-2 border-bottom bg-white rounded-3 shadow-sm mb-3 mx-0">
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <div class="form-check group-permission <?php echo e($permission_group->group_name); ?>">
                                                            <input class="form-check-input cursor-pointer" type="checkbox" name="group-permission[]" id="group-<?php echo e($groupIndex); ?>" onchange="checkPermissionByGroup('<?php echo e($permission_group->group_name); ?>')">
                                                            <label class="form-check-label fw-bold text-dark cursor-pointer" for="group-<?php echo e($groupIndex); ?>">
                                                                <?php echo e(ucfirst($permission_group->group_name)); ?>

                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 border-start border-md-top-0">
                                                        <?php
                                                            $groupWisePermissions = \DB::table('permissions')
                                                                ->where('group_name', $permission_group->group_name)
                                                                ->get();
                                                            $permissinCount = count($groupWisePermissions);
                                                        ?>
                                                        <ul class="permission-list list-group list-group-flush">
                                                            <?php $__currentLoopData = $groupWisePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="list-group-item bg-transparent border-0 py-1 px-2">
                                                                    <div class="form-check single-permission per-<?php echo e($permission_group->group_name); ?>">
                                                                        <input class="form-check-input cursor-pointer" type="checkbox" value="<?php echo e($permission->name); ?>" name="permissions[]" 
                                                                            id="permission<?php echo e($permission->id); ?>" 
                                                                            onchange="checkUncheckModuleByPermission('per-<?php echo e($permission_group->group_name); ?>', '<?php echo e($permission_group->group_name); ?>', <?php echo e($permissinCount); ?>)">
                                                                        <label class="form-check-label text-muted small cursor-pointer" for="permission<?php echo e($permission->id); ?>">
                                                                            <?php echo e(ucwords(str_replace('.', ' ', $permission->name))); ?>

                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 pt-3 border-top">
                                <div class="col-12 d-flex gap-2 justify-content-end">
                                    <a href="<?php echo e(url('users')); ?>" class="btn btn-light px-4 border">Cancel</a>
                                    <button type="submit" class="btn btn-success px-5 shadow-sm">
                                        <i class="fa-solid fa-user-plus me-1"></i> Save User
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(function() {
                allChecked();
            });

            $('.select-all-permission input').on('change', function() {
                const isChecked = $(this).is(':checked');
                $(".group-permission input").prop("checked", isChecked);
                $(".single-permission input").prop("checked", isChecked);
            });

            function checkPermissionByGroup(groupName) {
                const isGroupChecked = $('.' + groupName + " input").is(':checked');
                $('.per-' + groupName + " input").prop("checked", isGroupChecked);
                allChecked();
            }

            function checkUncheckModuleByPermission(permissionClassName, GroupClassName, countTotalPermission) {
                const groupIdCheckBox = $('.' + GroupClassName + " input");
                const currentCheckedLength = $('.' + permissionClassName + " input:checked").length;
                
                if (currentCheckedLength === countTotalPermission) {
                    groupIdCheckBox.prop("checked", true);
                } else {
                    groupIdCheckBox.prop("checked", false);
                }
                allChecked();
            }

            function allChecked() {
                const countTotalPermission = <?php echo e(count($permissions)); ?>;
                const totalChecked = $(".single-permission input:checked").length;
                $('.select-all-permission input').prop("checked", totalChecked === countTotalPermission && countTotalPermission > 0);
            }
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\users\create.blade.php ENDPATH**/ ?>