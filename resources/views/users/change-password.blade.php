<x-app-layout>
    <x-slot name="title">
        Change Password
    </x-slot>
    
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .card-custom {
                border: none;
                border-radius: 16px;
                background: #ffffff;
            }
            .form-icon-wrap {
                position: relative;
            }
            .form-icon-wrap i {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #a0aec0;
                transition: color 0.2s;
            }
            .form-icon-wrap .form-control {
                padding-left: 45px;
                border-radius: 10px;
                padding-top: 12px;
                padding-bottom: 12px;
            }
            .form-icon-wrap .form-control:focus + i {
                color: #0d6efd;
            }
        </style>
    @endpush

    <div class="content container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                
                @if (session('status'))
                    <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        <div>{{ session('status') }}</div>
                    </div>
                @endif

                <div class="card card-custom shadow-sm p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-shield-halved fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark m-0">Update Password</h3>
                        <p class="text-muted small mt-1">Ensure your account is using a long, random password to stay secure.</p>
                    </div>

                    <form action="{{ route('change-password') }}" method="POST">
                        @method('PUT')
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Old Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                    name="old_password" value="{{ old('old_password') }}" placeholder="Enter current password" required autofocus>
                                <i class="fa-solid fa-lock"></i>
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">New Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                    name="new_password" value="{{ old('new_password') }}" placeholder="Minimum 8 characters" required>
                                <i class="fa-solid fa-key"></i>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Confirm New Password <span class="text-danger">*</span></label>
                            <div class="form-icon-wrap">
                                <input type="password" class="form-control" 
                                    name="new_password_confirmation" placeholder="Repeat new password" required>
                                <i class="fa-solid fa-check-double"></i>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm py-2.5 rounded-3">
                                <i class="fa-solid fa-floppy-disk me-2 small"></i>Save Changes
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-link text-decoration-none text-muted btn-sm mt-1">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>