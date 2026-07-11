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
        Basic Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Basic Settings</h2>
                        <p class="text-muted small mb-0">Configure your default localization, formatting, and currency preferences.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="<?php echo e(route('basic-setting')); ?>" method="POST" class="needs-validation" novalidate>
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Default Country</label>
                                        <select name="default_country" class="form-select <?php $__errorArgs = ['default_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="Bangladesh" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Bangladesh') ) ? 'selected' : ''); ?>>Bangladesh</option>
                                            <option value="India" <?php echo e(($basicSettings && ($basicSettings->default_country == 'India') ) ? 'selected' : ''); ?>>India</option>
                                            <option value="Pakisthan" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Pakisthan') ) ? 'selected' : ''); ?>>Pakisthan</option>
                                            <option value="Miyanmar" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Miyanmar') ) ? 'selected' : ''); ?>>Miyanmar</option>
                                            <option value="Nepal" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Nepal') ) ? 'selected' : ''); ?>>Nepal</option>
                                            <option value="Bhutan" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Bhutan') ) ? 'selected' : ''); ?>>Bhutan</option>
                                            <option value="Srilanka" <?php echo e(($basicSettings && ($basicSettings->default_country == 'Srilanka') ) ? 'selected' : ''); ?>>Srilanka</option>
                                        </select>
                                        <?php $__errorArgs = ['default_country'];
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
                                        <label class="form-label fw-semibold text-secondary">Date Format</label>
                                        <select name="date_format" class="form-select <?php $__errorArgs = ['date_format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">                                    
                                            <option value="Y-m-d" <?php echo e(($basicSettings && ($basicSettings->date_format == 'Y-m-d') ) ? 'selected' : ''); ?>>2016-05-15</option>
                                            <option value="d/m/Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'd/m/Y') ) ? 'selected' : ''); ?>>15/05/2016</option>
                                            <option value="d.m.Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'd.m.Y') ) ? 'selected' : ''); ?>>15.05.2016</option>
                                            <option value="d-m-Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'd-m-Y') ) ? 'selected' : ''); ?>>15-05-2016</option>
                                            <option value="m/d/Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'm/d/Y') ) ? 'selected' : ''); ?>>05/15/2016</option>
                                            <option value="Y/m/d" <?php echo e(($basicSettings && ($basicSettings->date_format == 'Y/m/d') ) ? 'selected' : ''); ?>>2016/05/15</option>
                                            <option value="M d Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'M d Y') ) ? 'selected' : ''); ?>>May 15 2016</option>
                                            <option value="d M Y" <?php echo e(($basicSettings && ($basicSettings->date_format == 'd M Y') ) ? 'selected' : ''); ?>>15 May 2016</option>
                                        </select>
                                        <?php $__errorArgs = ['date_format'];
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
                                        <label class="form-label fw-semibold text-secondary">Timezone</label>
                                        <select name="timezone" class="form-select <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="Asia/Dhaka" <?php echo e(($basicSettings && ($basicSettings->timezone == 'Asia/Dhaka') ) ? 'selected' : ''); ?>>(UTC +6:00) Asia/Dhaka</option>
                                            <option value="America/New_York" <?php echo e(($basicSettings && ($basicSettings->timezone == 'America/New_York') ) ? 'selected' : ''); ?>>(UTC -5:00) America/New_York</option>
                                        </select>
                                        <?php $__errorArgs = ['timezone'];
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
                                        <label class="form-label fw-semibold text-secondary">Default Language</label>
                                        <select name="default_language" class="form-select <?php $__errorArgs = ['default_language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="English" <?php echo e(($basicSettings && ($basicSettings->default_language == 'English') ) ? 'selected' : ''); ?>>English</option>
                                            <option value="Bangla" <?php echo e(($basicSettings && ($basicSettings->default_language == 'Bangla') ) ? 'selected' : ''); ?>>Bangla</option>
                                            <option value="French" <?php echo e(($basicSettings && ($basicSettings->default_language == 'French') ) ? 'selected' : ''); ?>>French</option>
                                        </select>
                                        <?php $__errorArgs = ['default_language'];
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
                                        <label class="form-label fw-semibold text-secondary">Currency Code</label>
                                        <select name="currency_code" class="form-select <?php $__errorArgs = ['currency_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="BDT" <?php echo e(($basicSettings && ($basicSettings->currency_code == 'BDT') ) ? 'selected' : ''); ?>>BDT</option>
                                            <option value="USD" <?php echo e(($basicSettings && ($basicSettings->currency_code == 'USD') ) ? 'selected' : ''); ?>>USD</option>
                                            <option value="Pound" <?php echo e(($basicSettings && ($basicSettings->currency_code == 'Pound') ) ? 'selected' : ''); ?>>Pound</option>
                                            <option value="EURO" <?php echo e(($basicSettings && ($basicSettings->currency_code == 'EURO') ) ? 'selected' : ''); ?>>EURO</option>
                                            <option value="Ringgit" <?php echo e(($basicSettings && ($basicSettings->currency_code == 'Ringgit') ) ? 'selected' : ''); ?>>Ringgit</option>
                                        </select>
                                        <?php $__errorArgs = ['currency_code'];
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
                                        <label class="form-label fw-semibold text-secondary">Currency Symbol</label>
                                        <select name="currency_symbol" class="form-select <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="৳" <?php echo e(($basicSettings && ($basicSettings->currency_symbol == '৳') ) ? 'selected' : ''); ?>>৳</option>
                                            <option value="$" <?php echo e(($basicSettings && ($basicSettings->currency_symbol == '$') ) ? 'selected' : ''); ?>>$</option>
                                            <option value="£" <?php echo e(($basicSettings && ($basicSettings->currency_symbol == '£') ) ? 'selected' : ''); ?>>£</option>
                                            <option value="€" <?php echo e(($basicSettings && ($basicSettings->currency_symbol == '€') ) ? 'selected' : ''); ?>>€</option>
                                            <option value="RM" <?php echo e(($basicSettings && ($basicSettings->currency_symbol == 'RM') ) ? 'selected' : ''); ?>>RM</option>
                                        </select>
                                        <?php $__errorArgs = ['currency_symbol'];
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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\basic-setting.blade.php ENDPATH**/ ?>