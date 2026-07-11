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
        Theme Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Theme Settings</h2>
                        <p class="text-muted small mb-0">Customize your website visual identity, logo options, and asset icons.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="<?php echo e(route('theme-setting')); ?>" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website Name</label>
                                        <input name="website_name"
                                            class="form-control <?php $__errorArgs = ['website_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($themeSettings ? $themeSettings->website_name : old('website_name')); ?>"
                                            placeholder="e.g. My Enterprise App" type="text" required>
                                        <div class="invalid-feedback">Website Name is required!</div>
                                        <?php $__errorArgs = ['website_name'];
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

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website Logo</label>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-9 col-sm-8">
                                                <input type="file" name="website_logo" id="website_logo"
                                                    class="form-control <?php $__errorArgs = ['website_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                                <div class="invalid-feedback">Website logo is required!</div>
                                                <?php $__errorArgs = ['website_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger small mt-1 d-block"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <div class="form-text text-muted small">Recommended image size is 40px × 40px</div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 d-flex justify-content-sm-end justify-content-start">
                                                <div class="p-2 border rounded bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                                                    <img id="website_logo_preview"
                                                        src="uploads/<?php echo e($themeSettings ? $themeSettings->website_logo : old('website_logo')); ?>"
                                                        alt="Logo Preview" class="img-fluid rounded" style="max-height: 40px; object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Favicon</label>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-9 col-sm-8">
                                                <input type="file" name="website_favicon" id="website_favicon"
                                                    class="form-control <?php $__errorArgs = ['website_favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                                <div class="invalid-feedback">Website favicon is required!</div>
                                                <?php $__errorArgs = ['website_favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger small mt-1 d-block"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <div class="form-text text-muted small">Recommended image size is 16px × 16px</div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 d-flex justify-content-sm-end justify-content-start">
                                                <div class="p-2 border rounded bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                                                    <img id="website_favicon_preview" 
                                                        src="uploads/<?php echo e($themeSettings ? $themeSettings->website_favicon : old('website_favicon')); ?>" 
                                                        alt="Favicon Preview" class="img-fluid" style="max-height: 16px; object-fit: contain;">
                                                </div>
                                            </div>
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

    <?php $__env->startPush('scripts'); ?>
        <script>
            website_logo.onchange = evt => {
                const [file] = website_logo.files
                if (file) {
                    website_logo_preview.src = URL.createObjectURL(file)
                }
            }

            website_favicon.onchange = evt => {
                const [file] = website_favicon.files
                if (file) {
                    website_favicon_preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\theme-setting.blade.php ENDPATH**/ ?>