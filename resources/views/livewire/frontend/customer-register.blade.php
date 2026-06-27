<div>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('/') }}" rel="nofollow">Home</a>
                <span></span> Register
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Create an Account</h3>
                                    </div>
                                    <form method="post" wire:submit.prevent='saveCustomerRegister'
                                        class="needs-validation" novalidate>
                                        <div class="form-group">
                                            <input type="text" required="" name="name"
                                                value="{{ old('name') }}" wire:model='name'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name">
                                            @error('name')
                                                <div class="invalid-feedback error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" required="" name="email"
                                                value="{{ old('email') }}" wire:model='email'
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email">
                                            @error('email')
                                                <div class="invalid-feedback error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="mobile"
                                                value="{{ old('mobile') }}" wire:model='mobile'
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                placeholder="Mobile">
                                            @error('mobile')
                                                <div class="invalid-feedback error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password"
                                                value="{{ old('password') }}" wire:model='password'
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password">
                                            @error('password')
                                                <div class="invalid-feedback error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password_confirmation"
                                                wire:model='password_confirmation'
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Confirm password">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="agree_with_terms" wire:medel='agree_with_terms'
                                                        class=""
                                                        id="exampleCheckbox12" value="{{ old('agree_with_terms') }}" required>

                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I
                                                            agree to terms &amp; Policy.</span></label>
                                                </div>
                                                @error('agree_with_terms')
                                                    <div class="invalid-feedback error_msg">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <a href="privacy-policy.html"><i
                                                    class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                                name="login">Submit &amp; Register</button>
                                        </div>
                                    </form>
                                    <div class="text-muted text-center">Already have an account? <a
                                            href="{{ route('customer-login') }}">Sign
                                            in now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('frontend-assets/imgs/login.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
