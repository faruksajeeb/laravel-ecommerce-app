<div class="widget-category mb-30 categori-dropdown-wrap">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $subCategories = App\Models\Subcategory::where('category_id', $category->id)
                    ->where('status', 1)
                    ->get();
            ?>
            <li class="<?php echo e(count($subCategories) > 0 ? 'has-children' : ''); ?>"><a href="#"
                    class="<?php echo e($categoryId == $category->id ? 'active' : ''); ?>"
                    wire:click.prevent='filterByCategory(<?php echo e($category->id); ?>)'><?php echo e($category->name); ?></a>
                <?php if(count($subCategories) > 0): ?>
                    <div class="dropdown-menu">
                        <ul class="">
                            
                            <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item nav-link nav_item"
                                        href="<?php echo e(route('search-by-subcategory', ['subcategoryId' => Crypt::encryptString($subcategory->id)])); ?>"><?php echo e($subcategory->subcategory_name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\filter-by-category.blade.php ENDPATH**/ ?>