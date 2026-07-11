<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo e(route('/')); ?>" rel="nofollow">Home</a>
                <span></span> Compare Products
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-30">Compare Products</h3>
                    <?php if(Cart::instance('compare')->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered compare-table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="align-middle">Feature</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $compareImage = $item->options->image;
                                                if (empty($compareImage) || $compareImage == '[]' || !file_exists(public_path('frontend-assets/imgs/products/' . $compareImage))) {
                                                    $compareImage = 'product-image-avatar.png';
                                                }
                                            ?>
                                            <th scope="col" class="align-middle product-col">
                                                <a href="#" class="text-danger"
                                                    wire:click.prevent="removeFromCompare(<?php echo e($item->id); ?>)"
                                                    aria-label="Remove">
                                                    <i class="fi-rs-cross-small"></i>
                                                </a>
                                                <a
                                                    href="<?php echo e(route('product-details', ['productId' => $item->model->id])); ?>">
                                                    <img class="img-fluid mb-10"
                                                        src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($compareImage); ?>"
                                                        alt="<?php echo e($item->name); ?>">
                                                </a>
                                                <h6 class="mb-0">
                                                    <a
                                                        href="<?php echo e(route('product-details', ['productId' => $item->model->id])); ?>"><?php echo e($item->name); ?></a>
                                                </h6>
                                            </th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <span class="text-brand fw-bold">৳ <?php echo e($item->price); ?></span>
                                                <?php if($item->model->regular_price > $item->price): ?>
                                                    <span
                                                        class="old-price font-md ml-10">৳ <?php echo e($item->model->regular_price); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">SKU</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($item->model->SKU ?? 'N/A'); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($item->model->category->name ?? 'N/A'); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Availability</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <?php if($item->model->stock_status == 'instock'): ?>
                                                    <span class="text-success">In Stock</span>
                                                <?php else: ?>
                                                    <span class="text-danger">Out of Stock</span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Short Description</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="text-start"><?php echo e(\Illuminate\Support\Str::limit($item->model->short_description, 120)); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Action</th>
                                        <?php $__currentLoopData = Cart::instance('compare')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-brand btn-block mb-10"
                                                    wire:click.prevent="moveProductToCart('<?php echo e($item->rowId); ?>')">
                                                    Add to Cart
                                                </button>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-20">
                            <button type="button" class="btn btn-brand btn-sm"
                                wire:click.prevent="clearCompare">Clear All</button>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            You have no products to compare.
                            <a href="<?php echo e(route('shop')); ?>" class="alert-link">Continue shopping</a>.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->startPush('styles'); ?>
    <style>
        .compare-table th,
        .compare-table td {
            vertical-align: middle;
            min-width: 180px;
        }

        .compare-table .product-col {
            min-width: 200px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\compare-component.blade.php ENDPATH**/ ?>