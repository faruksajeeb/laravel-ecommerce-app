<div class="sidebar-widget price_range range mb-30">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">Filtered by price</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
    <div class="price-filter">
        <div class="price-filter-inner">
            <div id="slider-range" wire:ignore></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <span>Range:</span>
                    <span class="text-info">৳ {{ $minPrice }}</span> - <span
                        class="text-info">৳ {{ $maxPrice }}</span>
                    {{-- <input type="text" id="amount" name="price" placeholder="Add Your Price"> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="list-group">
        <div class="list-group-item mb-10 mt-10">
            <label class="fw-900">Color</label>
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                <label class="form-check-label" for="exampleCheckbox1"><span>Red
                        (56)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                <label class="form-check-label" for="exampleCheckbox2"><span>Green
                        (78)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                <label class="form-check-label" for="exampleCheckbox3"><span>Blue
                        (54)</span></label>
            </div>
            <label class="fw-900 mt-15">Item Condition</label>
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                <label class="form-check-label" for="exampleCheckbox11"><span>New
                        (1506)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished
                        (27)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                <label class="form-check-label" for="exampleCheckbox31"><span>Used
                        (45)</span></label>
            </div>
        </div>
    </div>
    <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
        Fillter</a>
</div>
@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        
        $(function() {
           
            sliderrange.slider({
                range: true,
                min: 0,
                max: 5000,
                values: [0, 5000],
                slide: function(event, ui) {
                  
                    // amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('minPrice',ui.values[0]);
                    @this.set('maxPrice',ui.values[1]);
                }
                //return false;
            });
            amountprice.val("৳ " + sliderrange.slider("values", 0) +
                " - ৳ " + sliderrange.slider("values", 1));
        });
    </script>
@endpush
