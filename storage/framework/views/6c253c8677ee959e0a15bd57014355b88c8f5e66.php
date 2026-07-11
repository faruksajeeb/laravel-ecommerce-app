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
        Change Password
     <?php $__env->endSlot(); ?>
    
    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .card-custom {
                border: none;
                border-radius: 16px;
                background: #ffffff;
            }
            .form-icon-wrap {
                position: relative;
            }
            .form-icon-wrap i {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #a0aec0;
                transition: color 0.2s;
            }
            .form-icon-wrap .form-control {
                padding-left: 45px;
                border-radius: 10px;
                padding-top: 12px;
                padding-bottom: 12px;
            }
            .form-icon-wrap .form-control:focus + i {
                color: #0d6efd;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <div class="content container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                
                <?php if(session('status')): ?>
                    <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        <div><?php echo e(session('status')); ?></div>
                    </div>
                <?php endif; ?>

                <div class="card card-custom shadow-sm p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-shield-halved fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark m-0">Update Password</h3>
                        <p class="text-muted small mt-1">Ensure your account is using a long, random password to stay secure.</p>
                    </div>

                    <form action="<?php echo e(route('change-password')); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Old Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="old_password" value="<?php echo e(old('old_password')); ?>" placeholder="Enter current password" required autofocus>
                                <i class="fa-solid fa-lock"></i>
                                <?php $__errorArgs = ['old_password'];
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
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">New Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="new_password" value="<?php echo e(old('new_password')); ?>" placeholder="Minimum 8 characters" required>
                                <i class="fa-solid fa-key"></i>
                                <?php $__errorArgs = ['new_password'];
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
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Confirm New Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control" 
                                    name="new_password_confirmation" placeholder="Repeat new password" required>
                                <i class="fa-solid fa-check-double"></i>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm py-2.5 rounded-3">
                                <i class="fa-solid fa-floppy-disk me-2 small"></i>Save Changes
                            </button>
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-link text-decoration-none text-muted btn-sm mt-1">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\users\change-password.blade.php ENDPATH**/ ?>