<div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i>
                                    English 
                                    
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <?php if(Auth::guard('customer')->check()): ?>
                               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.customer-logout')->html();
} elseif ($_instance->childHasBeenRendered('5ZROROh')) {
    $componentId = $_instance->getRenderedChildComponentId('5ZROROh');
    $componentTag = $_instance->getRenderedChildComponentTagName('5ZROROh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5ZROROh');
} else {
    $response = \Livewire\Livewire::mount('frontend.customer-logout');
    $html = $response->html();
    $_instance->logRenderedChild('5ZROROh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            <?php else: ?>
                            <li><i class="fi-rs-key"></i><a href="<?php echo e(route('customer-login')); ?>">Log In </a> / <a
                                href="<?php echo e(route('customer-register')); ?>">Sign
                                Up</a></li>
                            <?php endif; ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><?php /**PATH D:\laragon\www\laravel\ecom\resources\views\livewire\frontend\header-top-component.blade.php ENDPATH**/ ?>