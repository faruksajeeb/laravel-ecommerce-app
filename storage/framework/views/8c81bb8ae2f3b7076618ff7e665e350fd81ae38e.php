<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form wire:submit.prevent="update" class="needs-validation" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-danger"><?php echo e(session('message')); ?></div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <label for="" class="form-label">Type:</label>
                        <div class="col-12">
                            <select name="type" wire:model='type' class="form-select type">
                                <option value="">--select type--</option>
                                <option value="percent">Percent</option>
                                <option value="fixed">Fixed</option>
                            </select>

                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Code:</label>
                        <div class="col-12">
                            <input type="text" name="code" id="code" wire:model="code"
                                class="form-control form-control-lg code" placeholder="Enter Code">
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Value:</label>
                        <div class="col-12">
                            <input type="text" name="value" id="value" wire:model="value"
                                class="form-control form-control-lg value" placeholder="Enter Code">
                            <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Cart Value:</label>
                        <div class="col-12">
                            <input type="text" name="cart_value" id="cart_value" wire:model="cart_value"
                                class="form-control form-control-lg cart_value" placeholder="Enter Code">
                            <?php $__errorArgs = ['cart_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label">Expiry Date:</label>

                        <div class="col-12">
                            <input type="text" name="edit_expiry_date" id="edit_expiry_date" wire:model="edit_expiry_date"
                                class="form-control form-control-lg datepicker" data-date-format="yyyy-mm-dd"
                                placeholder="Enter expiry date">
                            <?php $__errorArgs = ['edit_expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetInputFields()"><i class="fa fa-remove"></i> Close</button>


                    <button type="button" class="btn btn-warning" wire:click="resetInputFields()"><i
                            class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-primary" <?php echo e($flag == 1 ? 'disabled' : ''); ?>><i
                            class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
      $('#edit_expiry_date').on('change', function(e) {
                var expiry_date = $('#edit_expiry_date').val();     
                 alert(expiry_date);       
                window.livewire.find('<?php echo e($_instance->id); ?>').set('edit_expiry_date', expiry_date);
            });

        $(document).ready(function() {
            $('#editModal').on('shown.bs.modal', function(e) {
                $(".datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/backend/coupon/edit.blade.php ENDPATH**/ ?>