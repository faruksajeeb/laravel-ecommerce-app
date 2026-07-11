<div>
    <div class="comments-area">
        <div class="row">
            <div class="col-lg-4">
                <div class="summary br-2">
                    <div class="rating-box d-flex align-items-center justify-content-between">
                        <div class="rating-number">
                            <h2 class="mb-0"><?php echo e(number_format($avgRating, 1)); ?></h2>
                            <p class="font-xs text-muted mb-0">out of 5</p>
                        </div>
                        <div class="rating-stars">
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:<?php echo e(($avgRating * 100) / 5); ?>%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted">(<?php echo e($totalReviews); ?>

                                    review<?php echo e($totalReviews == 1 ? '' : 's'); ?>)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="mb-30"><?php echo e($totalReviews); ?> Review<?php echo e($totalReviews == 1 ? '' : 's'); ?></h4>
                <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="single-comment justify-content-between d-flex mb-30">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb text-center">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:#fde2e2;color:#e9595b;display:flex;align-items:center;justify-content:center;font-weight:700;">
                                    <?php echo e(strtoupper(substr($item->customer_name ?? 'A', 0, 1))); ?>

                                </div>
                                <h6 class="mt-10 mb-0"><?php echo e($item->customer_name ?? 'Anonymous'); ?></h6>
                            </div>
                            <div class="desc">
                                <div class="product-rate-cover text-left">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:<?php echo e(($item->ratings * 100) / 5); ?>%">
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-10 mt-10"><?php echo e($item->comment); ?></p>
                                <span
                                    class="font-xs text-muted"><?php echo e($item->created_at->format('M d, Y')); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">There are no reviews yet. Be the first to review this product.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="comment-form mt-30">
        <h4 class="mb-15">Write a Review</h4>

        <?php if(!Auth::guard('customer')->check()): ?>
            <div class="alert alert-warning">
                Please <a href="<?php echo e(route('customer-login')); ?>">login</a> to write a review.
            </div>
        <?php else: ?>
            <form wire:submit.prevent="saveReview">
                <div class="row">
                    <div class="col-12 mb-20">
                        <span class="d-inline-block mr-10 font-sm" style="font-weight:600;">Your Rating:</span>
                        <div class="star-input d-inline-block align-middle" wire:ignore>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <i class="star <?php if($i <= $ratings): ?> active <?php endif; ?>" data-value="<?php echo e($i); ?>"
                                    style="cursor:pointer; font-size:24px; color:<?php echo e($i <= $ratings ? '#ffb503' : '#ddd'); ?>;">&#9733;</i>
                            <?php endfor; ?>
                        </div>
                        <input type="hidden" wire:model="ratings">
                        <?php $__errorArgs = ['ratings'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger ml-10 font-sm d-block mt-5"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 mb-20">
                        <textarea class="form-control" placeholder="Write your review here..." rows="4"
                            wire:model="comment"></textarea>
                        <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger font-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button button-contactForm">Submit Review</button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.star-input .star').on('click', function() {
                var val = $(this).data('value');
                window.livewire.find('<?php echo e($_instance->id); ?>').set('ratings', val);
                $('.star-input .star').each(function() {
                    $(this).css('color', $(this).data('value') <= val ? '#ffb503' : '#ddd');
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\review.blade.php ENDPATH**/ ?>