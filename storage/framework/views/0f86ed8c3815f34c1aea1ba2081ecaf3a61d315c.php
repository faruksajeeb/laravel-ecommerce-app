<div>
     <?php $__env->slot('title', null, []); ?> 
        Customers
     <?php $__env->endSlot(); ?>

    <div>
        <section>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header bg-white my-0 pt-2 pb-0">
                            <div class="row ">
                                <div class="col-md-8">
                                    <h4 class="card-title py-1"><i class="fa fa-list"></i> Customers</h4>                     
                                </div>
                                <div class="col-md-4 col-sm-12 text-end">
                                    
                                    <a class="btn btn-sm btn-success float-end"
                                        wire:click.prevent="render('excelExport')"><i class="fa-solid fa-download"></i>
                                        Export</a>
                                    
                                    
                                    
                                    <!-- Button trigger modal -->
                                    
                                    
                                    
                                </div>

                            </div>
                        </div>
                        <div class="card-body py-1">
                            <div class="row my-1">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input class="form-control border-end-0 border rounded-pill" type="text"
                                            placeholder="Search..." wire:model="searchTerm">
                                    </div>
                                    
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" wire:model='status' class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="1">Active</option>
                                        <option value="-1">Inactive</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2">
                                    <select name="" id="" wire:model='orderBy' class="form-control">
                                        <option value="">--Order By--</option>
                                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($col); ?>"><?php echo e($col); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" wire:model='sortBy' class="form-control">
                                        <option value="">--Sort By--</option>
                                        <option value="DESC">Decending</option>
                                        <option value="ASC">Ascending</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    Per Page
                                    <select name="" id="" class="py-0" wire:model='pazeSize'>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                    </select>
                                    Current Page <?php echo e($customers->currentPage()); ?>

                                </div>
                            </div>
                            <?php if($customers->total()>0): ?>
                            <table class="table table-striped table-brodered table-sm">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + $customers->firstItem()); ?></td>
                                            <td><?php echo e($val->name); ?></td>
                                            <td><?php echo e($val->email); ?></td>
                                            <td><?php echo e($val->mobile); ?></td>
                                            
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input active_inactive_btn "
                                                        status="<?php echo e($val->status); ?>" <?php echo e($val->status == -1 ? '' : ''); ?>

                                                        table="customers" type="checkbox"
                                                        id="row_<?php echo e($val->id); ?>"
                                                        value="<?php echo e(Crypt::encryptString($val->id)); ?>"
                                                        <?php echo e($val->status == 1 ? 'checked' : ''); ?>

                                                        style="cursor:pointer">
                                                </div>
                                            </td>
                                            <td><?php echo e($val->created_at); ?></td>
                                            <td><?php echo e($val->updated_at); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-success me-1 py-1 mt-1 "
                                                    wire:click.prevent="edit('<?php echo e(Crypt::encryptString($val->id)); ?>')"
                                                    data-bs-toggle="modal"  
                                                    data-bs-target="#editModal" title="Edit"><i
                                                        class="fa-solid fa-file-pen"></i></button>

                                                <button class="btn btn-sm btn-danger py-1 mt-1 del_btn"
                                                    
                                                    wire:click.prevent="$emit('triggerDelete','<?php echo e(Crypt::encryptString($val->id)); ?>')"
                                                     title="Delete"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <p class="text-center">No record found.</p>
                            <?php endif; ?>
                        </div>

                        <div class="card-footer " wire:key="$customers->id">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo e($customers->links()); ?>

                                </div>
                                <div class="col-md-6 text-end">
                                    <div>
                                        <p class="text-sm text-gray-700 leading-5">
                                            <?php echo __('Showing'); ?>

                                            <span class="font-medium"><?php echo e($customers->firstItem()); ?></span>
                                            <?php echo __('to'); ?>

                                            <span class="font-medium"><?php echo e($customers->lastItem()); ?></span>
                                            <?php echo __('of'); ?>

                                            <span class="font-medium"><?php echo e($customers->total()); ?></span>
                                            <?php echo __('results'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            // $(document).ready(function() {
            //     $('#search_category_id').select2();
            //     $('#search_category_id').on('change', function(e) {
            //         var data = $('#search_category_id').select2("val");
            //         Livewire.emit('listenerReferenceHere', data);
            //         window.livewire.find('<?php echo e($_instance->id); ?>').set('search_category_id', data);
            //     });
            // });
            document.addEventListener('DOMContentLoaded', function() {

                window.livewire.find('<?php echo e($_instance->id); ?>').on('triggerDelete', deleteId => {
                    Swal.fire({
                        title: 'Are You Sure?',
                        text: 'This record will be deleted!',
                        type: "warning",
                        showCancelButton: true,
                        // confirmButtonColor: 'var(--success)',
                        // cancelButtonColor: 'var(--primary)',
                        confirmButtonText: 'Delete!'
                    }).then((result) => {
                        //if user clicks on delete
                        if (result.value) {
                            // calling destroy method to delete
                            window.livewire.find('<?php echo e($_instance->id); ?>').call('destroy', deleteId)
                            // success response
                            //responseAlert({title: session('message'), type: 'success'});

                        } else {
                            Swal.fire({
                                title: 'Operation Cancelled!',
                                type: 'success'
                            });
                        }
                    });
                });
            })
        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/backend/customer/index.blade.php ENDPATH**/ ?>