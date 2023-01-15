<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="#" class="<?php echo e($categoryId == $category->id ? 'active' : ''); ?>"
                    wire:click.prevent='filterByCategory(<?php echo e($category->id); ?>)'><?php echo e($category->name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/filter-by-category.blade.php ENDPATH**/ ?>