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
        Roles
     <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title py-1"><i class="fa fa-list"></i> Roles</h3>
                        </div>
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb" class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                                    <li class="breadcrumb-item " aria-current="page">Roles</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <form action="" method="GET">
                            <input type="hidden" name="_token" value="B7Tuv4nPCe86gWsjastnnmhS3EQPF2a7rOxWV7IA">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <select name="search_status" class="form-select" id="search_status">
                                        <option value="">Select Status</option>
                                        <option value="7">Active
                                        </option>
                                        <option value="-7">Inactive
                                        </option>
                                        <option value="-1">Deleted
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-12 px-0">
                                    <div class="input-group">
                                        <input type="text" name="search_text" value="" class="form-control"
                                            placeholder="Search by text">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary mx-1" name="submit_btn" type="submit"
                                                value="search">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                            <button class="btn btn-xs btn-success float-end" name="submit_btn"
                                                value="export" type="submit">
                                                <i class="fa-solid fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <a href="<?php echo e(route('clear-permission-cache')); ?>" class="btn btn-outline-secondary">Clear Permission Cache</a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                    <a href="<?php echo e(route('roles.create')); ?>"
                                        class="btn btn-xs btn-outline-primary float-end" name="create_new"
                                        type="button">
                                        <i class="fa-solid fa-plus"></i> Create New
                                    </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </form>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Guard Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($val->name); ?></td>
                                        <td width="30%">
                                            <?php $__currentLoopData = $val->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge bg-info text-dark"><?php echo e($permission->name); ?></span>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td><?php echo e($val->guard_name); ?></td>
                                        <td><?php echo e($val->created_at); ?></td>
                                        <td><?php echo e($val->updated_at); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.edit')): ?>
                                                <a href="<?php echo e(route('roles.edit', Crypt::encryptString($val->id))); ?>"
                                                    class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.delete')): ?>
                                                <a href="<?php echo e(route('roles.destroy', Crypt::encryptString($val->id))); ?>"
                                                    class="btn btn-outline-danger"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($val->id); ?>').submit();"><i
                                                        class="fa-solid fa-remove"></i></a>
                                                <form id="delete-form-<?php echo e($val->id); ?>"
                                                    action="<?php echo e(route('roles.destroy', Crypt::encryptString($val->id))); ?>"
                                                    method="POST">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($roles->links()); ?>

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
<?php endif; ?>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/roles/index.blade.php ENDPATH**/ ?>