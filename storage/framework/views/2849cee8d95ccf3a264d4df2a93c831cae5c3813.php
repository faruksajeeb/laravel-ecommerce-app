<div class="topbar sticky-top bg-white border-b shadow-sm py-2 px-4 d-flex align-items-center justify-content-between">
  
    <div class="d-flex align-items-center gap-3 flex-grow-1 max-w-md">
        <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center p-2" onclick="toggleMenu()" style="width: 36px; height: 36px;" aria-label="Toggle Menu">
            <i class="fa fa-solid fa-bars text-secondary fs-5"></i>
        </button>

        <div class="search-wrapper w-100 position-relative d-none d-md-block">
            <i class="fa fa-solid fa-magnifying-glass text-muted position-absolute start-0 top-50 translate-middle-y ms-3"></i>
            <input type="text" class="form-control form-control-sm border-0 bg-light ps-5 rounded-pill py-2" placeholder="Search dashboard..." style="font-size: 0.875rem;" />
        </div>
    </div>

    <div class="d-flex align-items-center gap-3">
        
        <div class="d-none d-sm-flex align-items-center gap-2">
            <a href="<?php echo e(url('clear')); ?>" class="btn btn-link btn-sm text-decoration-none text-danger fw-medium px-2.5">
                <i class="fa-solid fa-trash-can me-1"></i> Clear Cache
            </a>
            <a href="<?php echo e(url('/')); ?>" target="_blank" class="btn btn-light btn-sm text-decoration-none text-dark fw-medium px-3 rounded-pill border border-slate-100">
                <i class="fa-solid fa-arrow-up-right-from-square me-1" style="font-size: 0.75rem;"></i> Visit Store
            </a>
        </div>

        <div class="d-none d-sm-block bg-light" style="width: 1px; height: 24px;"></div>

        <div class="dropdown user">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle gap-2 bg-light p-1.5 pe-3 rounded-pill"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo e(asset('images/user.png')); ?>" alt="user image" width="28" height="28" class="rounded-circle object-fit-cover shadow-sm bg-white">
                <span class="d-none d-md-inline font-medium text-slate-800 tracking-tight" style="font-size: 0.85rem;">
                    <?php echo e(Auth::user()->name); ?>

                </span>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 py-2 rounded-4" style="min-width: 200px; font-size: 0.875rem;" aria-labelledby="dropdownUser1">
                <div class="px-3 py-2 border-b d-md-none">
                    <p class="mb-0 fw-bold text-dark"><?php echo e(Auth::user()->name); ?></p>
                    <small class="text-muted text-xs">Administrator</small>
                </div>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.profile')): ?>
                <li>
                    <a class="dropdown-item py-2 d-flex align-items-center gap-2 text-secondary" href="<?php echo e(route('user-profile')); ?>">
                        <i class="fa-regular fa-user text-muted w-4"></i> My Profile
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change.password')): ?>
                <li>
                    <a class="dropdown-item py-2 d-flex align-items-center gap-2 text-secondary" href="<?php echo e(route('change-password')); ?>">
                        <i class="fa-solid fa-key text-muted w-4"></i> Change Password
                    </a>
                </li>
                <?php endif; ?>

                <li><hr class="dropdown-divider my-1 opacity-50"></li>
                
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="m-0">
                        <?php echo csrf_field(); ?>
                        <a class="dropdown-item py-2 d-flex align-items-center gap-2 text-danger font-medium" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> <?php echo e(__('Log Out')); ?>

                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<style>
    /* Premium Modern Minimal Overrides */
    .border-b {
        border-bottom: 1px solid #f1f5f9 !important;
    }
    .bg-light {
        background-color: #f8fafc !important;
    }
    .max-w-md {
        max-width: 440px;
    }
    .rounded-4 {
        border-radius: 0.75rem !important;
    }
    .text-xs {
        font-size: 0.75rem;
    }
    /* Smooth interaction transformations */
    .dropdown-item {
        transition: all 0.2s ease;
    }
    .dropdown-item:hover {
        background-color: #f8fafc !important;
        color: #db2777 !important; /* Accent Pink alignment match */
    }
    /* Hide default bootstrap native chevron arrow icon for cleaner pill appearance */
    .dropdown-toggle::after {
        display: none !important;
    }
</style><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\layouts\topbar.blade.php ENDPATH**/ ?>