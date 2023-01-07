<section id="sidebar">
    <div class="navigation bg-white">
        <div class="row brand-name-section">
            <div class="col-md-12">
                <ul class="p-0 brand-name">
                    <li class="">
                        <a href="<?php echo e(route('dashboard')); ?>" class="bg-white ">
                            <span class="icon"><i class="fa-brands fa-xl fa-apple"></i></span>
                            <span class="title">
                                <h5 class=" py-4"><?php echo e($company_settings->company_name); ?></h5>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="side-menu h-100 ">
            <ul class="p-0 mb-3" id="menu">
                <?php if(Auth::guard('web')->user()->can('option_group.view') ||
                    Auth::guard('web')->user()->can('option.view')): ?>
                    <li>
                        <a href="#master_submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                            <span class="icon"><i class="fa-solid fa-list"></i></span>
                            <span class="ms-1 d-sm-inline title ">Master</span>
                            <i class="icon fa-solid fa-angle-right text-right"></i>
                        </a>
                        <ul class="collapse nav flex-column ms-3 ps-3 <?php echo e(Route::is('users.index') || Route::is('users.create') || Route::is('roles.index') || Route::is('roles.create') ? 'show' : ''); ?>"
                            id="master_submenu1" data-bs-parent="#menu">
                            <li class="<?php echo e(Route::is('option-groups') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('option-groups')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Option Groups</span></a>
                            </li>
                            <li class="<?php echo e(Route::is('options') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('options')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Options</span></a>
                            </li>
                            <li class="<?php echo e(Route::is('categories') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('categories')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Categories</span></a>
                            </li>
                            <li class="<?php echo e(Route::is('subcategories') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('subcategories')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Subcategories</span></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if(Auth::guard('web')->user()->can('user.view') ||
                    Auth::guard('web')->user()->can('user.create') ||
                    Auth::guard('web')->user()->can('role.view') ||
                    Auth::guard('web')->user()->can('role.create')): ?>
                    <li>
                        <a href="#user_submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                            <span class="icon"><i class="fa-solid fa-users"></i></span>
                            <span class="ms-1 d-sm-inline title ">Users</span>
                            <i class="icon fa-solid fa-angle-right text-right"></i>
                        </a>
                        <ul class="collapse nav flex-column ms-3 ps-3 <?php echo e(Route::is('users.index') || Route::is('users.create') || Route::is('roles.index') || Route::is('roles.create') ? 'show' : ''); ?>"
                            id="user_submenu1" data-bs-parent="#menu">
                            <?php if(Auth::guard('web')->user()->can('user.view') ||
                                Auth::guard('web')->user()->can('user.create')): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
                                    <li class="<?php echo e(Route::is('users.create') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url('users/create')); ?>" class="nav-link px-2"> <span
                                                class="d-sm-inline"><i class="fa-solid fa-pencil"></i> Create
                                                User</span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
                                    <li class="<?php echo e(Route::is('users.index') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url('users')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                                    class="fa-solid fa-table"></i> Manage
                                                Users</span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                    <li class="<?php echo e(Route::is('roles.create') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url('roles/create')); ?>" class="nav-link px-2"> <span
                                                class="d-sm-inline"><i class="fa-solid fa-pencil"></i> Create
                                                Role</span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.view')): ?>
                                    <li class="<?php echo e(Route::is('roles.index') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url('roles')); ?>" class="nav-link px-2"> <span class="d-sm-inline"><i
                                                    class="fa-solid fa-table"></i> Manage
                                                Roles</span></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                        <span class="icon"><i class="fa-solid fa-gear"></i></span>
                        <span class="ms-1 d-sm-inline title ">Settings</span>
                        <i class="icon fa-solid fa-angle-right text-right"></i>
                    </a>
                    <ul class="collapse nav flex-column ms-3 ps-3 <?php echo e(Route::is('company-setting') ||
                    Route::is('basic-setting') ||
                    Route::is('email-setting') ||
                    Route::is('theme-setting') ||
                    Route::is('invoice-setting') ||
                    Route::is('approval-setting') ||
                    Route::is('salary-setting') ||
                    Route::is('notification-setting') ||
                    Route::is('toxbox-setting') ||
                    Route::is('cron-setting')
                        ? 'show'
                        : ''); ?>"
                        id="submenu1" data-bs-parent="#menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company.setting')): ?>
                            <li class="<?php echo e(Route::is('company-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('company-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-building"></i> <span class="d-sm-inline ps-1 mb-1"> Company
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('basic.setting')): ?>
                            <li class="<?php echo e(Route::is('basic-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('basic-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-clock"></i> <span class="d-sm-inline ps-1 mb-1"> Basic
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('theme.setting')): ?>
                            <li class="<?php echo e(Route::is('theme-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('theme-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-image"></i> <span class="d-sm-inline ps-1 mb-1"> Theme
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email.setting')): ?>
                            <li class="<?php echo e(Route::is('email-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('email-setting')); ?>" class="nav-link px-2"><i class="fa-solid fa-at"></i>
                                    <span class="d-sm-inline ps-1 mb-1"> Email Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('performance.setting')): ?>
                            <li class="<?php echo e(Route::is('performance-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('performance-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-chart-bar"></i> <span class="d-sm-inline ps-1 mb-1">
                                        Performance
                                        Configuration</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approval.setting')): ?>
                            <li class="<?php echo e(Route::is('approval-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('approval-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-thumbs-up"></i> <span class="d-sm-inline ps-1 mb-1"> Approval
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice.setting')): ?>
                            <li class="<?php echo e(Route::is('invoice-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('invoice-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-pencil-square"></i> <span class="d-sm-inline ps-1 mb-1">
                                        Invoice
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salary.setting')): ?>
                            <li class="<?php echo e(Route::is('salary-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('salary-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-money-bill"></i> <span class="d-sm-inline ps-1 mb-1"> Salary
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification.setting')): ?>
                            <li class="<?php echo e(Route::is('notification-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('notification-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-globe"></i> <span class="d-sm-inline ps-1 mb-1"> Notifications
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('toxbox.setting')): ?>
                            <li class="<?php echo e(Route::is('toxbox-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('toxbox-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-comment"></i> <span class="d-sm-inline ps-1 mb-1">ToxBox
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cron.setting')): ?>
                            <li class="<?php echo e(Route::is('cron-setting') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('cron-setting')); ?>" class="nav-link px-2"><i
                                        class="fa-solid fa-rocket"></i> <span class="d-sm-inline ps-1 mb-1">Cron
                                        Settings</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>