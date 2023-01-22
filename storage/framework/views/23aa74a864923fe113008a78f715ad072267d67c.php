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
        Dashboard
     <?php $__env->endSlot(); ?>
    <?php $__env->startPush('style'); ?>
        <style>
.card-box .card .numbers{
    font-size:405px!important;
}
            </style>
    <?php $__env->stopPush(); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.view')): ?>
        <div class="card-box p-1">
            <div class="card mx-1">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"><i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo e($totalRevenue); ?></div>
                        <div class="card-name">Total Revenue</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-bangladeshi-taka-sign display-6 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"> <?php echo e($totalSales); ?></div>
                        <div class="card-name">Total Sales</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-cart-flatbed-suitcase display-6"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"><i class="fa-solid fa-bangladeshi-taka-sign"></i>  <?php echo e($todayRevenue); ?></div>
                        <div class="card-name">Today Revenue</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-bangladeshi-taka-sign display-6 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="numbers"> <?php echo e($todaySales); ?></div>
                        <div class="card-name">Today Sales</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                        <div class="iconBox">
                            <i class="fa-solid fa-cart-flatbed-suitcase display-6"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Modal -->
        
        <div class="row  p-2">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header bg-white">
                        <h4 class="card-title">Latest 10 Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        
                                        <th class="text-center">Order ID</th>
                                        <th>Customer Name</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-end">Total</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                    <tr>
                                        
                                        <td class="text-center"><?php echo e($order->id); ?></td>
                                        <td><?php echo e($order->first_name.' '.$order->last_name); ?></td>
                                        <td class="text-center"><i class="fa-solid fa-mobile-retro"></i> <?php echo e($order->mobile); ?></td>
                                        <td class="text-center"><i class="fa-solid fa-envelope"></i> <?php echo e($order->email); ?></td>
                                        <td class="text-end"><i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo e($order->total); ?></td>
                                        <td class="text-center"><i class="fa-solid fa-calander"></i> <?php echo e($order->created_at); ?></td>
                                        <td class="text-center"><i class="fa-solid fa-calander"></i> <?php echo App\Lib\Webspice::textStatus($order->status); ?></td>
                                    </tr>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/dashboard.blade.php ENDPATH**/ ?>