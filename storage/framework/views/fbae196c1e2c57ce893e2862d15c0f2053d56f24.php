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
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Fill by price</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Range:</span><input type="text" id="amount" name="price"
                                            placeholder="Add Your Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Color</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red
                                            (56)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>Green
                                            (78)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue
                                            (54)</span></label>
                                </div>
                                <label class="fw-900 mt-15">Item Condition</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"><span>New
                                            (1506)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox21" value="">
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished
                                            (27)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox31" value="">
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used
                                            (45)</span></label>
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                            Fillter</a>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('frontend-assets/imgs/shop/thumbnail-3.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                <p class="price mb-0 mt-5">$99.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('frontend-assets/imgs/shop/thumbnail-4.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Chen Sweater</a></h6>
                                <p class="price mb-0 mt-5">$89.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('frontend-assets/imgs/shop/thumbnail-5.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Colorful Jacket</a></h6>
                                <p class="price mb-0 mt-5">$25</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <li><a class="<?php echo e($orderBy == 'Default Sorting' ? 'active' : ''); ?>"
                                                href="#"
                                                wire:click.prevent='changeOrderBy("Default Sorting")'>Default
                                                Sorting</a></li>
                                        <li><a class="<?php echo e($orderBy == 'Price: Low to High' ? 'active' : ''); ?>"
                                                href="#"
                                                wire:click.prevent='changeOrderBy("Price: Low to High")'>Price: Low to
                                                High</a></li>
                                        <li><a class="<?php echo e($orderBy == 'Price: High to Low' ? 'active' : ''); ?>"
                                                href="#"
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
                            $wishItems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(route('product-details', ['productId' => $product->id])); ?>">
                                                <img class="default-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($product->image); ?>"
                                                    alt="">
                                                <img class="hover-img"
                                                    src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($product->image); ?>"
                                                    alt="">
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
                                            <span>??? <?php echo e($product->sale_price); ?> </span>
                                            <span class="old-price">??? <?php echo e($product->regular_price); ?></span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <?php if($wishItems->contains($product->id)): ?>
                                                <a aria-label="Remove from Wishlist"
                                                    class="action-btn hover-up wishlisted" href="#"
                                                    wire:click.prevent='removeFromWishList(<?php echo e($product->id); ?>)'><i
                                                        class="fi-rs-heart"></i></a>
                                            <?php else: ?>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent='addToWishList(<?php echo e($product->id); ?>,"<?php echo e($product->name); ?>",<?php echo e($product->sale_price); ?>,"M","<?php echo e($product->image); ?>")'><i
                                                        class="fi-rs-heart"></i></a>
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
<?php /**PATH C:\xampp8.1.6\htdocs\laravel-ecommerce-app\resources\views/livewire/frontend/search-component.blade.php ENDPATH**/ ?>