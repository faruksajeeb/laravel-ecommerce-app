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
        User Profile
     <?php $__env->endSlot(); ?>
    
    <?php $__env->startPush('styles'); ?>
        <style>
            .profile-avatar-wrap {
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 auto;
            }
            .avatar-status-indicator {
                position: absolute;
                bottom: 4px;
                right: 4px;
                width: 16px;
                height: 16px;
                border: 3px solid #fff;
            }
            .nav-pills-custom .nav-link {
                color: #6c757d;
                font-weight: 500;
                padding: 0.75rem 1.25rem;
                border-radius: 8px;
            }
            .nav-pills-custom .nav-link.active {
                background-color: var(--bs-primary-bg-subtle, #e7f1ff);
                color: var(--bs-primary, #0d6efd);
            }
            .activity-timeline {
                border-left: 2px solid #dee2e6;
                padding-left: 20px;
            }
            .activity-item {
                position: relative;
                padding-bottom: 1.5rem;
            }
            .activity-item::before {
                content: "";
                position: absolute;
                left: -26px;
                top: 4px;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: var(--bs-primary, #0d6efd);
            }
        </style>
    <?php $__env->stopPush(); ?>

    <div class="content container-fluid py-4">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12">

                <!-- Page Header -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-1 fw-bold text-dark">Account Overview</h4>
                        <p class="text-muted small mb-0">Manage your profile information and security settings.</p>
                    </div>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-2 px-3">
                        Edit Profile
                    </a>
                </div>

                <div class="row g-4">
                    <!-- Left Sidebar Column -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-4 bg-white mb-4">
                            <div class="card-body">
                                <div class="profile-avatar-wrap mb-3">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->name)); ?>&background=0D6EFD&color=fff&size=120" 
                                         class="rounded-circle img-fluid border border-2 border-light shadow-sm" 
                                         alt="<?php echo e(auth()->user()->name); ?>">
                                    <span class="avatar-status-indicator bg-success rounded-circle"></span>
                                </div>
                                <h5 class="fw-bold text-dark mb-1"><?php echo e(auth()->user()->name); ?></h5>
                                <p class="text-muted small mb-3"><?php echo e(auth()->user()->email); ?></p>
                                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill small fw-medium">Verified Customer</span>
                            </div>
                            <hr class="text-muted opacity-25 my-2">
                            <div class="card-body py-2">
                                <div class="row text-center">
                                    <div class="col-6 border-end">
                                        <h6 class="fw-bold mb-0 text-dark">12</h6>
                                        <small class="text-muted extra-small">Orders</small>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="fw-bold mb-0 text-dark">2024</h6>
                                        <small class="text-muted extra-small">Joined Year</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Secondary Tab Navigation Layout -->
                        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white d-none d-lg-block">
                            <div class="nav flex-column nav-pills nav-pills-custom" role="tablist">
                                <button class="nav-link active text-start mb-1" data-bs-toggle="pill" type="button">
                                    Profile Details
                                </button>
                                <button class="nav-link text-start mb-1" data-bs-toggle="pill" type="button">
                                    Security Settings
                                </button>
                                <button class="nav-link text-start" data-bs-toggle="pill" type="button">
                                    Order History
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Main Content Column -->
                    <div class="col-lg-8">
                        <!-- Profile Data Information Card -->
                        <div class="card border-0 shadow-sm rounded-4 p-4 p-sm-5 bg-white mb-4">
                            <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Profile Information</h5>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-medium mb-1">Full Name</label>
                                    <div class="fw-semibold text-dark py-2 px-3 bg-light rounded-3"><?php echo e(auth()->user()->name); ?></div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-medium mb-1">Email Address</label>
                                    <div class="fw-semibold text-dark py-2 px-3 bg-light rounded-3"><?php echo e(auth()->user()->email); ?></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-medium mb-1">Account Registered</label>
                                    <div class="fw-semibold text-dark py-2 px-3 bg-light rounded-3">
                                        <?php echo e(auth()->user()->created_at?->format('F d, Y') ?? 'N/A'); ?>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-medium mb-1">Two-Factor Authentication</label>
                                    <div class="d-flex align-items-center py-2">
                                        <span class="badge bg-danger-subtle text-danger px-2 py-1.5 rounded-2 small me-2">Disabled</span>
                                        <a href="#" class="text-decoration-none small text-primary fw-medium">Setup now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Log Timeline -->
                        <div class="card border-0 shadow-sm rounded-4 p-4 p-sm-5 bg-white">
                            <h5 class="fw-bold text-dark mb-4">Recent Activity</h5>
                            
                            <div class="activity-timeline mt-2 mx-2">
                                <div class="activity-item">
                                    <p class="mb-1 fw-semibold text-dark small">Logged in successfully</p>
                                    <small class="text-muted d-block extra-small">Today at 10:24 AM • IP: 192.168.1.1</small>
                                </div>
                                <div class="activity-item">
                                    <p class="mb-1 fw-semibold text-dark small">Password updated</p>
                                    <small class="text-muted d-block extra-small">June 28, 2026 at 3:15 PM</small>
                                </div>
                                <div class="activity-item mb-0 pb-0" style="border-left: none;">
                                    <p class="mb-1 fw-semibold text-dark small">Account created</p>
                                    <small class="text-muted d-block extra-small">Initial sign-up completed</small>
                                </div>
                            </div>
                        </div>
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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\users\user-profile.blade.php ENDPATH**/ ?>