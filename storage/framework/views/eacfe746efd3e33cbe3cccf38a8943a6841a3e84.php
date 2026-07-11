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
        Company Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Company Settings</h2>
                        <p class="text-muted small mb-0">Update your company details and public profile information.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">
                        
                        <form action="<?php echo e(route('company-setting')); ?>" method="POST" class="needs-validation" novalidate>
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Company Name <span class="text-danger">*</span></label>
                                        <input name="company_name" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text"
                                            value="<?php echo e($companySettings ? $companySettings->company_name : old('company_name')); ?>" placeholder="e.g. Acme Corp" required>
                                        <div class="invalid-feedback company_name_err">Company Name is required!</div>
                                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger small mt-1 d-block"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Contact Person</label>
                                        <input name="contact_person" class="form-control"
                                            value="<?php echo e((old('contact_person')) ? old('contact_person'):($companySettings ? $companySettings->contact_person : '')); ?>"
                                            placeholder="e.g. John Doe" type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Address</label>
                                        <input name="address" class="form-control" placeholder="123 Main St, Suite 100"
                                            value="<?php echo e((old('address')) ? old('address'):(($companySettings) ? $companySettings->address :'')); ?>" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Country</label>
                                        <input name="country" class="form-control" placeholder="United States"
                                            value="<?php echo e((old('country')) ? old('country'):($companySettings ? $companySettings->country : '')); ?>" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">City</label>
                                        <input name="city" class="form-control" placeholder="New York"
                                            value="<?php echo e((old('city')) ? old('city'):($companySettings ? $companySettings->city : '')); ?>" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">State/Province</label>
                                        <input name="state" class="form-control" placeholder="NY"
                                            value="<?php echo e((old('state')) ? old('state'):($companySettings ? $companySettings->state : '')); ?>" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Postal Code</label>
                                        <input name="postal_code" class="form-control"
                                            value="<?php echo e((old('postal_code')) ? old('postal_code'):($companySettings ? $companySettings->postal_code : '')); ?>"
                                            type="text" placeholder="10001">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Email Address</label>
                                        <input name="email" class="form-control" placeholder="info@company.com"
                                            value="<?php echo e((old('email')) ? old('email'):($companySettings ? $companySettings->email : '')); ?>" type="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Phone Number</label>
                                        <input name="phone_number" class="form-control"
                                            value="<?php echo e((old('phone_number')) ? old('phone_number'):($companySettings ? $companySettings->phone_number : '')); ?>"
                                            type="text" placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Mobile Number</label>
                                        <input name="mobile_number" class="form-control"
                                            value="<?php echo e((old('mobile_number')) ? old('mobile_number'):($companySettings ? $companySettings->mobile_number : '')); ?>"
                                            type="text" placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Fax</label>
                                        <input name="fax" class="form-control" placeholder="Enter fax number"
                                            value="<?php echo e((old('fax')) ? old('fax'):($companySettings ? $companySettings->fax : '')); ?>" type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website URL</label>
                                        <input name="website_url" class="form-control" placeholder="https://example.com"
                                            value="<?php echo e((old('website_url')) ? old('website_url'):($companySettings ? $companySettings->website_url : '')); ?>"
                                            type="url">
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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\company-setting.blade.php ENDPATH**/ ?>