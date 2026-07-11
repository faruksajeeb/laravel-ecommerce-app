<footer class="main">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.news-letter-component')->html();
} elseif ($_instance->childHasBeenRendered('p8Y6Pfz')) {
    $componentId = $_instance->getRenderedChildComponentId('p8Y6Pfz');
    $componentTag = $_instance->getRenderedChildComponentTagName('p8Y6Pfz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('p8Y6Pfz');
} else {
    $response = \Livewire\Livewire::mount('frontend.news-letter-component');
    $html = $response->html();
    $_instance->logRenderedChild('p8Y6Pfz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a> | <a href="<?php echo e(route('terms-n-conditions')); ?>">Terms &
                        Conditions</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    &copy; <strong class="text-brand">SajeebEcomApp</strong> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\laragon\www\laravel\ecom\resources\views/livewire/frontend/footer.blade.php ENDPATH**/ ?>