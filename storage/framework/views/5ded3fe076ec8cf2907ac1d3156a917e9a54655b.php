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
        Notification Settings
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Notification Settings</h2>
                        <p class="text-muted small mb-0">Toggle global automated alerts, distribution lists, and real-time app notifications.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="#" method="POST" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            
                            <div class="border rounded-3 overflow-hidden mb-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Employee Alerts</span>
                                            <small class="text-muted">Staff status modifications and profiles changes notifications.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[staff]" id="staff_module">
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Holidays</span>
                                            <small class="text-muted">Updates regarding company holiday schedules and operational calendar events.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[holidays]" id="holidays_module" checked>
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Leaves</span>
                                            <small class="text-muted">Managerial approval requests and team balance updates.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[leaves]" id="leave_module" checked>
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Events</span>
                                            <small class="text-muted">Corporate broadcasts, team gathering schedules, and global announcements.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[events]" id="events_module" checked>
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Chat Activity</span>
                                            <small class="text-muted">Real-time alerts for direct messaging, threads, and platform @mentions.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[chat]" id="chat_module" checked>
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 bg-white">
                                        <div>
                                            <span class="fw-semibold text-dark d-block">Jobs Pipeline</span>
                                            <small class="text-muted">System level alerts for application updates, incoming candidates, and interviews.</small>
                                        </div>
                                        <div class="form-check form-switch fs-5">
                                            <input class="form-check-input" type="checkbox" name="modules[jobs]" id="job_module">
                                        </div>
                                    </li>
                                </ul>
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
<?php endif; ?><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\settings\notification-setting.blade.php ENDPATH**/ ?>