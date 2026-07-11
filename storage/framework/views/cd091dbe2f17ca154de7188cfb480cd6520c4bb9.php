<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Fashion
                <span></span> Abstract Print Patchwork Dress
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <?php
                                        $images = explode(',', $product->images);
                                        $featureImage = $product->image ?: 'product-image-avatar.png';
                                    ?>
                                    <div class="product-image-slider">
                                        <!-- MAIN IMAGE VIEW-->
                                        <figure class="border-radius-10">

                                            <img style="width:500px; height:700px" class="image-view"
                                                src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($featureImage); ?>"
                                                alt="Gallery Image <?php echo e($product->name); ?>">
                                        </figure>
                                        <!--  SLIDER IMAGE VIEW-->
                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($image): ?>
                                                <figure class="border-radius-10">
                                                    <img style="width:80px; height:80px"
                                                        src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($image); ?>"
                                                        alt="Gallery Image <?php echo e($product->name); ?>">
                                                </figure>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15" wire:ignore>
                                        <!-- MAIN IMAGE THUMBNAIL-->
                                        <div><img src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($featureImage); ?>"
                                                alt="Gallery Image <?php echo e($product->name); ?>"></div>
                                        <!-- SLIDER IMAGE THUMBNAIL-->
                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($image): ?>
                                                <div><img
                                                        src="<?php echo e(asset('frontend-assets/imgs/products')); ?>/<?php echo e($image); ?>"
                                                        alt="Gallery Image <?php echo e($product->name); ?>"></div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <?php
                                    $shareUrl = urlencode(url()->current()); // or route('blog.details', $blog->slug)
                                    $shareTitle = urlencode($blog->title ?? config('app.name'));
                                    $shareImage ='';
                                ?>

                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>

                                        <!-- Facebook -->
                                        <li class="social-facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($shareUrl); ?>"
                                                target="_blank" rel="noopener noreferrer">
                                                <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-facebook.svg')); ?>"
                                                    alt="Facebook">
                                            </a>
                                        </li>

                                        <!-- X (Twitter) -->
                                        <li class="social-twitter">
                                            <a href="https://twitter.com/intent/tweet?url=<?php echo e($shareUrl); ?>&text=<?php echo e($shareTitle); ?>"
                                                target="_blank" rel="noopener noreferrer">
                                                <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-twitter.svg')); ?>"
                                                    alt="X (Twitter)">
                                            </a>
                                        </li>

                                        <!-- Instagram -->
                                        <li class="social-instagram">
                                            <a href="https://www.instagram.com/share/?url=<?php echo e($shareUrl); ?>"
                                                target="_blank" rel="noopener noreferrer">
                                                <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-instagram.svg')); ?>"
                                                    alt="Instagram">
                                            </a>
                                        </li>

                                        <!-- Pinterest -->
                                        <li class="social-pinterest">
                                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo e($shareUrl); ?>&media=<?php echo e($shareImage); ?>&description=<?php echo e($shareTitle); ?>"
                                                target="_blank" rel="noopener noreferrer">
                                                <img src="<?php echo e(asset('frontend-assets/imgs/theme/icons/icon-pinterest.svg')); ?>"
                                                    alt="Pinterest">
                                            </a>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail"><?php echo e($product->name); ?></h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Brands: <a href="<?php echo e(route('shop')); ?>">Bootstrap</a></span>
                                        </div>
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:<?php echo e(($avgRating * 100) / 5); ?>%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (<?php echo e($totalReviews); ?>

                                        review<?php echo e($totalReviews == 1 ? '' : 's'); ?>)</span>
                                </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">৳ <?php echo e($product->sale_price); ?></span></ins>
                                            <ins><span class="old-price font-md ml-15">৳
                                                    <?php echo e($product->regular_price); ?></span></ins>
                                            <span class="save-price  font-md color3 ml-15">25% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p><?php echo e($product->short_description); ?></p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year Brand
                                                Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy
                                            </li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <form wire:submit.prevent='store'>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" wire:model='product_id'>
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <input type="hidden" name="" id="product_color" wire:model='color'>
                                            <ul class="list-filter color-filter" wire:ignore>
                                                <li><a href="#" class="color" data-color="red"><span
                                                            class="product-color-red"></span></a></li>
                                                <li><a href="#" class="color" data-color="yellow"><span
                                                            class="product-color-yellow"></span></a></li>
                                                <li class="active"><a href="#" data-color="white"><span
                                                            class="product-color-white"></span></a></li>
                                                <li><a href="#" class="color" data-color="orange"><span
                                                            class="product-color-orange"></span></a></li>
                                                <li><a href="#" class="color" data-color="cyan"><span
                                                            class="product-color-cyan"></span></a></li>
                                                <li><a href="#" class="color" data-color="green"><span
                                                            class="product-color-green"></span></a></li>
                                                <li><a href="#" class="color" data-color="purple"><span
                                                            class="product-color-purple"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <input type="hidden" name="" id="product_size"
                                                wire:model='size'>
                                            <ul class="list-filter size-filter font-small" wire:ignore>
                                                <li><a href="#" class="size" data-size="XS">XS</a></li>
                                                <li><a href="#" class="size" data-size="S">S</a></li>
                                                <li class="active"><a href="#" class="size"
                                                        data-size="M">M</a></li>
                                                <li><a href="#" class="size" data-size="L">L</a></li>
                                                <li><a href="#" class="size" data-size="XL">XL</a></li>
                                                <li><a href="#" class="size" data-size="XXL">XXL</a></li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">

                                            <input type="hidden" name="" id="product_quantity"
                                                wire:model='quantity'>
                                            <div class="detail-qty border radius" wire:ignore>
                                                <a href="#" class="qty-down quantity"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up quantity"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"
                                                    >Add
                                                    to
                                                    cart</button>
                                                <?php
                                                    $wishItems = Cart::instance('wishlist')->content()->pluck('id');
                                                ?>
                                                <?php if($wishItems->contains($product->id)): ?>
                                                    <a aria-label="Remove from Wishlist"
                                                        class="action-btn hover-up wishlisted" href="#"
                                                        wire:click.prevent='removeFromWishList(<?php echo e($product->id); ?>)'><i
                                                            class="fi-rs-heart"></i></a>
                                                <?php else: ?>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        wire:click.prevent='addToWishList(<?php echo e($product->id); ?>,"<?php echo e($product->name); ?>",<?php echo e($product->sale_price); ?>,"M","<?php echo e($product->image); ?>")'><i
                                                            class="fi-rs-heart"></i></a>
                                                <?php endif; ?>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    wire:click.prevent='addToCompare(<?php echo e($product->id); ?>,"<?php echo e($product->name); ?>",<?php echo e($product->sale_price); ?>,"<?php echo e($product->image); ?>")'><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>

                                        </div>
                                    </form>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#"><?php echo e($product->SKU); ?></a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a
                                                href="#" rel="tag">Women</a>, <a href="#"
                                                rel="tag">Dress</a> </li>
                                        <li>Availability:<span
                                                class="in-stock text-success ml-5"><?php echo e($product->quantity); ?> Items In
                                                Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                        href="#Additional-info">Additional info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                        href="#Reviews">Reviews (<?php echo e($totalReviews); ?>)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p><?php echo e($product->short_description); ?></p>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    <?php echo e($product->description); ?>

                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.review', ['productId' => $productId])->html();
} elseif ($_instance->childHasBeenRendered('l4219034183-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4219034183-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4219034183-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4219034183-0');
} else {
    $response = \Livewire\Livewire::mount('frontend.review', ['productId' => $productId]);
    $html = $response->html();
    $_instance->logRenderedChild('l4219034183-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>
                            </div>
                        </div>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.related-products-component', ['categoryId' => $product->category_id, 'productId' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('l4219034183-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l4219034183-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4219034183-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4219034183-1');
} else {
    $response = \Livewire\Livewire::mount('frontend.related-products-component', ['categoryId' => $product->category_id, 'productId' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l4219034183-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    
                    <!-- Fillter By Price -->
                    
                    <!-- Product sidebar Widget -->
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.new-products-component')->html();
} elseif ($_instance->childHasBeenRendered('l4219034183-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l4219034183-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4219034183-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4219034183-2');
} else {
    $response = \Livewire\Livewire::mount('frontend.new-products-component');
    $html = $response->html();
    $_instance->logRenderedChild('l4219034183-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.color').on('click', function(e) {
                var colorValue = $(this).attr("data-color");
                window.livewire.find('<?php echo e($_instance->id); ?>').set('color', colorValue);
                $('#product_color').val(colorValue);
            });
            $('.size').on('click', function(e) {
                var sizeValue = $(this).attr("data-size");
                window.livewire.find('<?php echo e($_instance->id); ?>').set('size', sizeValue);
                $('#product_size').val(sizeValue);
            });
            $('.quantity').on('click', function(e) {
                var qtyValue = $(".qty-val").text();
                window.livewire.find('<?php echo e($_instance->id); ?>').set('quantity', qtyValue);
                $('#product_quantity').val(qtyValue);
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/product-details.blade.php ENDPATH**/ ?>