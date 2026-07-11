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
        Email Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Email Settings</h2>
                        <p class="text-muted small mb-0">Configure your system outbound mail servers, transport layers, and authentications.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="#" method="POST" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            
                            <div class="mb-5 p-3 bg-light rounded-3 border">
                                <label class="form-label d-block fw-semibold text-secondary mb-3">Default Mail Driver</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mailoption" id="phpmail" value="option1" checked>
                                        <label class="form-check-label fw-medium" for="phpmail">PHP Mail</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mailoption" id="smtpmail" value="option2">
                                        <label class="form-check-label fw-medium" for="smtpmail">SMTP Server</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <div class="border-bottom pb-2 mb-4">
                                    <h3 class="fs-5 fw-bold text-dark mb-1">PHP Email Settings</h3>
                                    <p class="text-muted small mb-0">Basic web server native configurations.</p>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">Email From Address</label>
                                            <input class="form-control" type="email" placeholder="noreply@yourdomain.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">Emails From Name</label>
                                            <input class="form-control" type="text" placeholder="e.g. App Notifications">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="border-bottom pb-2 mb-4">
                                    <h3 class="fs-5 fw-bold text-dark mb-1">SMTP Email Settings</h3>
                                    <p class="text-muted small mb-0">Dedicated relay configurations for robust transactional delivery.</p>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP HOST</label>
                                            <input class="form-control" type="text" placeholder="smtp.mailgun.org">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP USER</label>
                                            <input class="form-control" type="text" placeholder="postmaster@yourdomain.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP PASSWORD</label>
                                            <input class="form-control" type="password" placeholder="••••••••••••">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP PORT</label>
                                            <input class="form-control" type="text" placeholder="587">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP Security</label>
                                            <select class="form-select">
                                                <option>None</option>
                                                <option selected>SSL</option>
                                                <option>TLS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary">SMTP Authentication Domain</label>
                                            <input class="form-control" type="text" placeholder="yourdomain.com">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 pt-3 border-top d-flex justify-content-end">
                                <button type="button" class="btn btn-light me-2 px-4 rounded-3">Cancel</button>
                                <button type="submit" class="btn btn-primary px-4 rounded-3 shadow-sm fw-medium">Save Changes</button>
                            </div>
                        </form>

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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\email-setting.blade.php ENDPATH**/ ?>