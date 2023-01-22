<?php $__env->startPush('styles'); ?>
<style>
.wishlisted{
    background-color: #F15412 !important;
    border: 1px solid transparent !important; 
}
.wishlisted i{
    color:#fff !important;
}
</style>
    
<?php $__env->stopPush(); ?>
<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.filter-by-category',['route'=>Route::currentRouteName()])->html();
} elseif ($_instance->childHasBeenRendered('l2676699194-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2676699194-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2676699194-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2676699194-0');
} else {
    $response = \Livewire\Livewire::mount('frontend.filter-by-category',['route'=>Route::currentRouteName()]);
    $html = $response->html();
    $_instance->logRenderedChild('l2676699194-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <!-- Fillter By Price -->                    
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.filter-by-price')->html();
} elseif ($_instance->childHasBeenRendered('l2676699194-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2676699194-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2676699194-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2676699194-1');
} else {
    $response = \Livewire\Livewire::mount('frontend.filter-by-price');
    $html = $response->html();
    $_instance->logRenderedChild('l2676699194-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <!-- Product sidebar Widget -->
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.new-products-component')->html();
} elseif ($_instance->childHasBeenRendered('l2676699194-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2676699194-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2676699194-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2676699194-2');
} else {
    $response = \Livewire\Livewire::mount('frontend.new-products-component');
    $html = $response->html();
    $_instance->logRenderedChild('l2676699194-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="<?php echo e(asset('frontend-assets/imgs/banner/banner-11.jpg')); ?>" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand"><?php echo e($products->total()); ?></strong> items for you!
                                <?php echo e($categoryName ? 'from ' : ''); ?><strong
                                    class="text-brand"><?php echo e($categoryId ? $categoryName : ''); ?></strong>
                                <?php echo e($categoryName ? 'category ' : ''); ?></p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> <?php echo e($pageSize); ?> <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="<?php echo e($pageSize == 12 ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changePageSize(12)'>12</a></li>
                                        <li><a class="<?php echo e($pageSize == 24 ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changePageSize(24)'>24</a></li>
                                        <li><a class="<?php echo e($pageSize == 32 ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changePageSize(32)'>32</a></li>
                                        <li><a class="<?php echo e($pageSize == 48 ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changePageSize(48)'>48</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        
                                        <span> <?php echo e($orderBy); ?> <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="<?php echo e($orderBy == 'Default Sorting' ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changeOrderBy("Default Sorting")'>Default
                                                Sorting</a></li>
                                        <li><a class="<?php echo e($orderBy == 'Price: Low to High' ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changeOrderBy("Price: Low to High")'>Price: Low to
                                                High</a></li>
                                        <li><a class="<?php echo e($orderBy == 'Price: High to Low' ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changeOrderBy("Price: High to Low")'>Price: High to
                                                Low</a></li>
                                        <li><a class="<?php echo e($orderBy == 'Release Date' ? 'active' : ''); ?>" href="#"
                                                wire:click.prevent='changeOrderBy("Release Date")'>Release Date</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        <?php
                            $wishItems = Cart::instance('wishlist')->content()->pluck('id');
                        ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(route('product-details', ['productId' => $product->id])); ?>">
                                                <img class="default-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs//products')); ?>/<?php echo e($product->image); ?>"
                                                    alt="<?php echo e($product->name); ?>-product-front" >
                                                <img class="hover-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs//products')); ?>/<?php echo e($product->image); ?>"
                                                    alt="<?php echo e($product->name); ?>-product-back" >
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html">Music</a>
                                        </div>
                                        <h2><a
                                                href="<?php echo e(route('product-details', ['productId' => $product->id])); ?>"><?php echo e($product->name); ?></a>
                                        </h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳ <?php echo e($product->sale_price); ?> </span>
                                            <span class="old-price">৳ <?php echo e($product->regular_price); ?></span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <?php if($wishItems->contains($product->id)): ?>
                                                <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                                href="#" wire:click.prevent='removeFromWishList(<?php echo e($product->id); ?>)'><i class="fi-rs-heart"></i></a>
                                            <?php else: ?>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="#" wire:click.prevent='addToWishList(<?php echo e($product->id); ?>,"<?php echo e($product->name); ?>",<?php echo e($product->sale_price); ?>,"M","<?php echo e($product->image); ?>")'><i class="fi-rs-heart"></i></a>
                                            <?php endif; ?>
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                    wire:click.prevent="store(<?php echo e($product->id); ?>,'<?php echo e($product->name); ?>',<?php echo e($product->sale_price); ?>,'M','<?php echo e($product->image); ?>')"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <?php echo e($products->links()); ?>

                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/shop.blade.php ENDPATH**/ ?>