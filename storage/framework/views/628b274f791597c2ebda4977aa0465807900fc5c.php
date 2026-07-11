<div class="main-categori-wrap d-none d-lg-block">
    <a class="categori-button-active" href="#">
        <span class="fi-rs-apps"></span> Browse Categories
    </a>
    <div class="categori-dropdown-wrap categori-dropdown-active-large">
        <ul>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $subCategories = App\Models\Subcategory::where('category_id',$category->id)->where('status',1)->get();
                ?>
                <li class="<?php echo e((count($subCategories)>0) ? 'has-children': ''); ?>">
                        <a href="<?php echo e(route('search-by-category',['categoryId'=>Crypt::encryptString($category->id)])); ?>" ><i class="sajeeb-font-dress"></i><?php echo e($category->name); ?></a>
                        
                       
                        <?php if(count($subCategories)>0): ?>
                        <div class="dropdown-menu">
                            <ul class="mega-menu d-lg-flex">
                                <li class="mega-menu-col col-lg-7">
                                    <ul class="d-lg-flex">
                                        <li class="mega-menu-col col-lg-6">
                                            <ul>
                                                
                                                <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                    href="<?php echo e(route('search-by-subcategory',['subcategoryId'=>Crypt::encryptString($subcategory->id)])); ?>"  ><?php echo e($subcategory->subcategory_name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>  
                        <?php endif; ?>
                    </li>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            
            
            
            </li>
            
        </ul>
        
    </div>
</div><?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/browse-categories-component.blade.php ENDPATH**/ ?>