<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Contact us
            </div>
        </div>
    </div>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <div class="card border-0 shadow-lg h-100 rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                                    <i class="fa-solid fa-envelope-open-text fs-3"></i>
                                </div>
                                <h2 class="fw-bold mb-1">Send us a message</h2>
                                <p class="text-muted mb-0">We'd love to hear from you. Fill out the form below and we'll get back to you soon.</p>
                            </div>

                            <form wire:submit.prevent="storeContact">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="name" placeholder="Full Name" id="contactName">
                                            <label for="contactName">Full Name</label>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="email" placeholder="Email" id="contactEmail">
                                            <label for="contactEmail">Email Address</label>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="mobile" placeholder="Phone" id="contactPhone">
                                            <label for="contactPhone">Phone Number</label>
                                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="subject" placeholder="Subject" id="contactSubject">
                                            <label for="contactSubject">Subject</label>
                                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="message" placeholder="Message" id="contactMessage" style="height: 130px"></textarea>
                                            <label for="contactMessage">Your Message</label>
                                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm fw-semibold py-2">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="p-4 p-md-5 text-white" style="background-color: #F15412;">
                                <h2 class="fw-bold mb-1">Contact Information</h2>
                                <p class="opacity-75 mb-0">Reach out to us anytime. We're here to help and answer any questions you might have.</p>
                            </div>
                            <div class="p-4 p-md-5">
                                <div class="row g-4 mb-4">
                                    <div class="col-md-4">
                                        <div class="text-center p-3 rounded-3 bg-light h-100 transition-hover">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                                                <i class="fa-solid fa-location-dot fs-4"></i>
                                            </div>
                                            <h6 class="fw-semibold mb-2">Address</h6>
                                            <p class="text-muted small mb-0"><?php echo e($company_settings->address ?? '562 Wellington Road'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3 rounded-3 bg-light h-100 transition-hover">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                                                <i class="fa-solid fa-phone fs-4"></i>
                                            </div>
                                            <h6 class="fw-semibold mb-2">Phone</h6>
                                            <p class="text-muted small mb-0"><?php echo e($company_settings->phone_number ?? '+1 0000-000-000'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3 rounded-3 bg-light h-100 transition-hover">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                                                <i class="fa-solid fa-envelope fs-4"></i>
                                            </div>
                                            <h6 class="fw-semibold mb-2">Email</h6>
                                            <p class="text-muted small mb-0"><?php echo e($company_settings->email ?? 'contact@sajeeb.in'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-3 overflow-hidden" style="height: 220px; background: url('<?php echo e(asset('frontend-assets/imgs/page/contact-1.png')); ?>') center/cover no-repeat;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\contact-component.blade.php ENDPATH**/ ?>