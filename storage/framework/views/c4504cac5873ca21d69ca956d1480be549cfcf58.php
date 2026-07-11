<div>
    <section class="newsletter p-5 text-white wow fadeIn animated">
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-email.svg')); ?>"
                                alt="">
                            <h4 class="font-size-20 mb-0 ml-3">
                                Sign up to Newsletter
                            </h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>5% coupon for first
                                    shopping.</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form wire:submit.prevent='subscribe' class="form-subcriber d-flex wow fadeIn animated needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <input type="email"
                            class="form-control bg-white font-small <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your email" wire:model='email'>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback error_msg"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\news-letter-component.blade.php ENDPATH**/ ?>