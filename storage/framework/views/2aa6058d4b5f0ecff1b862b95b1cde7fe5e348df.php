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
        Salary Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Salary Settings</h2>
                        <p class="text-muted small mb-0">Manage calculation variables, allowances, statutory provisions, and tax configurations.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="#" method="POST" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            
                            <div class="mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="fs-5 fw-bold text-dark mb-0">DA and HRA</h3>
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" name="allowances_status" id="switch_hra" checked>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">DA (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">HRA (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="fs-5 fw-bold text-dark mb-0">Provident Fund Settings</h3>
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" name="pf_status" id="switch_pf" checked>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">Employee Share (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">Organization Share (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="fs-5 fw-bold text-dark mb-0">ESI Settings</h3>
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" name="esi_status" id="switch_esi">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">Employee Share (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-item">
                                            <label class="form-label fw-semibold text-secondary small">Organization Share (%)</label>
                                            <input type="text" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <h3 class="fs-5 fw-bold text-dark mb-0">TDS Settings</h3>
                                        <span class="badge bg-light text-secondary border fw-normal">Annual Salary</span>
                                    </div>
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" name="tds_status" id="switch_tds">
                                    </div>
                                </div>

                                <div class="d-flex flex-column gap-3">
                                    <div class="row g-2 align-items-end">
                                        <div class="col-sm-4">
                                            <div class="form-item">
                                                <label class="form-label fw-semibold text-secondary small mb-1">Salary From</label>
                                                <input class="form-control" type="text" placeholder="Min Value">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-item">
                                                <label class="form-label fw-semibold text-secondary small mb-1">Salary To</label>
                                                <input class="form-control" type="text" placeholder="Max Value">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-item">
                                                <label class="form-label fw-semibold text-secondary small mb-1">%</label>
                                                <input class="form-control" type="text" placeholder="Rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline-danger w-100" type="button" title="Delete Row">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-end">
                                        <div class="col-sm-4">
                                            <div class="form-item">
                                                <label class="form-label d-sm-none fw-semibold text-secondary small mb-1">Salary From</label>
                                                <input class="form-control" type="text" placeholder="Min Value">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-item">
                                                <label class="form-label d-sm-none fw-semibold text-secondary small mb-1">Salary To</label>
                                                <input class="form-control" type="text" placeholder="Max Value">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-item">
                                                <label class="form-label d-sm-none fw-semibold text-secondary small mb-1">%</label>
                                                <input class="form-control" type="text" placeholder="Rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline-danger w-100" type="button" title="Delete Row">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2 ms-auto">
                                            <button class="btn btn-outline-primary w-100" type="button" title="Add Rule">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\salary-setting.blade.php ENDPATH**/ ?>