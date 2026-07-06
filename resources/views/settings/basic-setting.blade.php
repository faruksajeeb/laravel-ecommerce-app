<x-app-layout>
    <x-slot name="title">
        Basic Settings
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Basic Settings</h2>
                        <p class="text-muted small mb-0">Configure your default localization, formatting, and currency preferences.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('basic-setting') }}" method="POST" class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Default Country</label>
                                        <select name="default_country" class="form-select @error('default_country') is-invalid @enderror">
                                            <option value="Bangladesh" {{ ($basicSettings && ($basicSettings->default_country == 'Bangladesh') ) ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="India" {{ ($basicSettings && ($basicSettings->default_country == 'India') ) ? 'selected' : '' }}>India</option>
                                            <option value="Pakisthan" {{ ($basicSettings && ($basicSettings->default_country == 'Pakisthan') ) ? 'selected' : '' }}>Pakisthan</option>
                                            <option value="Miyanmar" {{ ($basicSettings && ($basicSettings->default_country == 'Miyanmar') ) ? 'selected' : '' }}>Miyanmar</option>
                                            <option value="Nepal" {{ ($basicSettings && ($basicSettings->default_country == 'Nepal') ) ? 'selected' : '' }}>Nepal</option>
                                            <option value="Bhutan" {{ ($basicSettings && ($basicSettings->default_country == 'Bhutan') ) ? 'selected' : '' }}>Bhutan</option>
                                            <option value="Srilanka" {{ ($basicSettings && ($basicSettings->default_country == 'Srilanka') ) ? 'selected' : '' }}>Srilanka</option>
                                        </select>
                                        @error('default_country')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Date Format</label>
                                        <select name="date_format" class="form-select @error('date_format') is-invalid @enderror">                                    
                                            <option value="Y-m-d" {{ ($basicSettings && ($basicSettings->date_format == 'Y-m-d') ) ? 'selected' : '' }}>2016-05-15</option>
                                            <option value="d/m/Y" {{ ($basicSettings && ($basicSettings->date_format == 'd/m/Y') ) ? 'selected' : '' }}>15/05/2016</option>
                                            <option value="d.m.Y" {{ ($basicSettings && ($basicSettings->date_format == 'd.m.Y') ) ? 'selected' : '' }}>15.05.2016</option>
                                            <option value="d-m-Y" {{ ($basicSettings && ($basicSettings->date_format == 'd-m-Y') ) ? 'selected' : '' }}>15-05-2016</option>
                                            <option value="m/d/Y" {{ ($basicSettings && ($basicSettings->date_format == 'm/d/Y') ) ? 'selected' : '' }}>05/15/2016</option>
                                            <option value="Y/m/d" {{ ($basicSettings && ($basicSettings->date_format == 'Y/m/d') ) ? 'selected' : '' }}>2016/05/15</option>
                                            <option value="M d Y" {{ ($basicSettings && ($basicSettings->date_format == 'M d Y') ) ? 'selected' : '' }}>May 15 2016</option>
                                            <option value="d M Y" {{ ($basicSettings && ($basicSettings->date_format == 'd M Y') ) ? 'selected' : '' }}>15 May 2016</option>
                                        </select>
                                        @error('date_format')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Timezone</label>
                                        <select name="timezone" class="form-select @error('timezone') is-invalid @enderror">
                                            <option value="Asia/Dhaka" {{ ($basicSettings && ($basicSettings->timezone == 'Asia/Dhaka') ) ? 'selected' : '' }}>(UTC +6:00) Asia/Dhaka</option>
                                            <option value="America/New_York" {{ ($basicSettings && ($basicSettings->timezone == 'America/New_York') ) ? 'selected' : '' }}>(UTC -5:00) America/New_York</option>
                                        </select>
                                        @error('timezone')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Default Language</label>
                                        <select name="default_language" class="form-select @error('default_language') is-invalid @enderror">
                                            <option value="English" {{ ($basicSettings && ($basicSettings->default_language == 'English') ) ? 'selected' : '' }}>English</option>
                                            <option value="Bangla" {{ ($basicSettings && ($basicSettings->default_language == 'Bangla') ) ? 'selected' : '' }}>Bangla</option>
                                            <option value="French" {{ ($basicSettings && ($basicSettings->default_language == 'French') ) ? 'selected' : '' }}>French</option>
                                        </select>
                                        @error('default_language')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Currency Code</label>
                                        <select name="currency_code" class="form-select @error('currency_code') is-invalid @enderror">
                                            <option value="BDT" {{ ($basicSettings && ($basicSettings->currency_code == 'BDT') ) ? 'selected' : '' }}>BDT</option>
                                            <option value="USD" {{ ($basicSettings && ($basicSettings->currency_code == 'USD') ) ? 'selected' : '' }}>USD</option>
                                            <option value="Pound" {{ ($basicSettings && ($basicSettings->currency_code == 'Pound') ) ? 'selected' : '' }}>Pound</option>
                                            <option value="EURO" {{ ($basicSettings && ($basicSettings->currency_code == 'EURO') ) ? 'selected' : '' }}>EURO</option>
                                            <option value="Ringgit" {{ ($basicSettings && ($basicSettings->currency_code == 'Ringgit') ) ? 'selected' : '' }}>Ringgit</option>
                                        </select>
                                        @error('currency_code')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Currency Symbol</label>
                                        <select name="currency_symbol" class="form-select @error('currency_symbol') is-invalid @enderror">
                                            <option value="৳" {{ ($basicSettings && ($basicSettings->currency_symbol == '৳') ) ? 'selected' : '' }}>৳</option>
                                            <option value="$" {{ ($basicSettings && ($basicSettings->currency_symbol == '$') ) ? 'selected' : '' }}>$</option>
                                            <option value="£" {{ ($basicSettings && ($basicSettings->currency_symbol == '£') ) ? 'selected' : '' }}>£</option>
                                            <option value="€" {{ ($basicSettings && ($basicSettings->currency_symbol == '€') ) ? 'selected' : '' }}>€</option>
                                            <option value="RM" {{ ($basicSettings && ($basicSettings->currency_symbol == 'RM') ) ? 'selected' : '' }}>RM</option>
                                        </select>
                                        @error('currency_symbol')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 pt-3 border-top d-flex justify-content-end">
                                <button type="button" class="btn btn-light me-2 px-4 rounded-3">Cancel</button>
                                <button type="submit" class="btn btn-primary px-4 rounded-3 shadow-sm fw-medium">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>