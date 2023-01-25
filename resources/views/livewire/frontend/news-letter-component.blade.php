<div>
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{ asset('frontend-assets/imgs/theme/icons/icon-email.svg') }}"
                                alt="">
                            <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>5% coupon for first
                                    shopping.</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form wire:submit.prevent='subscribe' class="form-subcriber d-flex wow fadeIn animated needs-validation" novalidate>
                        @csrf
                        <input type="email"
                            class="form-control bg-white font-small @error('email') is-invalid @enderror"
                            placeholder="Enter your email" wire:model='email'>
                        @error('email')
                            <div class="invalid-feedback error_msg">{{ $message }}</div>
                        @enderror
                        <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
</div>
