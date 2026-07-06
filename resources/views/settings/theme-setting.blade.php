<x-app-layout>
    <x-slot name="title">
        Theme Settings
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="h4 mb-1 fw-bold text-dark">Theme Settings</h2>
                        <p class="text-muted small mb-0">Customize your website visual identity, logo options, and asset icons.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('theme-setting') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @method('PUT')
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website Name</label>
                                        <input name="website_name"
                                            class="form-control @error('website_name') is-invalid @enderror"
                                            value="{{ $themeSettings ? $themeSettings->website_name : old('website_name') }}"
                                            placeholder="e.g. My Enterprise App" type="text" required>
                                        <div class="invalid-feedback">Website Name is required!</div>
                                        @error('website_name')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Website Logo</label>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-9 col-sm-8">
                                                <input type="file" name="website_logo" id="website_logo"
                                                    class="form-control @error('website_logo') is-invalid @enderror" required>
                                                <div class="invalid-feedback">Website logo is required!</div>
                                                @error('website_logo')
                                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                                <div class="form-text text-muted small">Recommended image size is 40px × 40px</div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 d-flex justify-content-sm-end justify-content-start">
                                                <div class="p-2 border rounded bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                                                    <img id="website_logo_preview"
                                                        src="uploads/{{ $themeSettings ? $themeSettings->website_logo : old('website_logo') }}"
                                                        alt="Logo Preview" class="img-fluid rounded" style="max-height: 40px; object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-item">
                                        <label class="form-label fw-semibold text-secondary">Favicon</label>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-9 col-sm-8">
                                                <input type="file" name="website_favicon" id="website_favicon"
                                                    class="form-control @error('website_favicon') is-invalid @enderror" required>
                                                <div class="invalid-feedback">Website favicon is required!</div>
                                                @error('website_favicon')
                                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                                <div class="form-text text-muted small">Recommended image size is 16px × 16px</div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 d-flex justify-content-sm-end justify-content-start">
                                                <div class="p-2 border rounded bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                                                    <img id="website_favicon_preview" 
                                                        src="uploads/{{ $themeSettings ? $themeSettings->website_favicon : old('website_favicon') }}" 
                                                        alt="Favicon Preview" class="img-fluid" style="max-height: 16px; object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
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

    @push('scripts')
        <script>
            website_logo.onchange = evt => {
                const [file] = website_logo.files
                if (file) {
                    website_logo_preview.src = URL.createObjectURL(file)
                }
            }

            website_favicon.onchange = evt => {
                const [file] = website_favicon.files
                if (file) {
                    website_favicon_preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush
</x-app-layout>