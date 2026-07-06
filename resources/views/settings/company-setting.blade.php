<x-app-layout>
    <x-slot name="title">
        Company Settings
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Company Settings</h2>
                        <p class="text-muted small mb-0">Update your company details and public profile information.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">
                        
                        <form action="{{ route('company-setting') }}" method="POST" class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Company Name <span class="text-danger">*</span></label>
                                        <input name="company_name" class="form-control @error('company_name') is-invalid @enderror" type="text"
                                            value="{{ $companySettings ? $companySettings->company_name : old('company_name') }}" placeholder="e.g. Acme Corp" required>
                                        <div class="invalid-feedback company_name_err">Company Name is required!</div>
                                        @error('company_name')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Contact Person</label>
                                        <input name="contact_person" class="form-control"
                                            value="{{ (old('contact_person')) ? old('contact_person'):($companySettings ? $companySettings->contact_person : '') }}"
                                            placeholder="e.g. John Doe" type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Address</label>
                                        <input name="address" class="form-control" placeholder="123 Main St, Suite 100"
                                            value="{{ (old('address')) ? old('address'):(($companySettings) ? $companySettings->address :'') }}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Country</label>
                                        <input name="country" class="form-control" placeholder="United States"
                                            value="{{ (old('country')) ? old('country'):($companySettings ? $companySettings->country : '') }}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">City</label>
                                        <input name="city" class="form-control" placeholder="New York"
                                            value="{{ (old('city')) ? old('city'):($companySettings ? $companySettings->city : '') }}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">State/Province</label>
                                        <input name="state" class="form-control" placeholder="NY"
                                            value="{{ (old('state')) ? old('state'):($companySettings ? $companySettings->state : '') }}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Postal Code</label>
                                        <input name="postal_code" class="form-control"
                                            value="{{ (old('postal_code')) ? old('postal_code'):($companySettings ? $companySettings->postal_code : '') }}"
                                            type="text" placeholder="10001">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Email Address</label>
                                        <input name="email" class="form-control" placeholder="info@company.com"
                                            value="{{ (old('email')) ? old('email'):($companySettings ? $companySettings->email : '') }}" type="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Phone Number</label>
                                        <input name="phone_number" class="form-control"
                                            value="{{ (old('phone_number')) ? old('phone_number'):($companySettings ? $companySettings->phone_number : '') }}"
                                            type="text" placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Mobile Number</label>
                                        <input name="mobile_number" class="form-control"
                                            value="{{ (old('mobile_number')) ? old('mobile_number'):($companySettings ? $companySettings->mobile_number : '') }}"
                                            type="text" placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Fax</label>
                                        <input name="fax" class="form-control" placeholder="Enter fax number"
                                            value="{{ (old('fax')) ? old('fax'):($companySettings ? $companySettings->fax : '') }}" type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website URL</label>
                                        <input name="website_url" class="form-control" placeholder="https://example.com"
                                            value="{{ (old('website_url')) ? old('website_url'):($companySettings ? $companySettings->website_url : '') }}"
                                            type="url">
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