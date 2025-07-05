@extends('layout.admin.app')
@section('title', 'Edit user')

@section('content')
<div id="content">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h1 class="page-title m-0 fw-bold text-primary">Edit user</h1>
            <a href="{{ route('users-list.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <form id="edituserForm" action="{{ route('users-list.update', $user->id) }}" method="POST"
              enctype="multipart/form-data"
              class="bg-white border p-4 rounded shadow-sm needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="row g-3">
                               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Name (English) <span class="text-danger">*</span></label>
                    <input type="text" name="name_en" value="{{ old('name_en', $user->name_en) }}"
                           class="form-control shadow-sm" required placeholder="Enter full name in English">
                    <div class="invalid-feedback">Please enter a name.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="form-control shadow-sm" required placeholder="example@example.com">
                    <div class="invalid-feedback">Please enter a valid email.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                           class="form-control shadow-sm" pattern="^[0-9]{7,15}$" placeholder="9800000000">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label class="form-label fw-semibold">Password <small class="text-muted">(Leave blank to keep current)</small></label>
                    <input type="password" name="password" id="passwordField" class="form-control shadow-sm"
                           placeholder="Enter new password if needed">
                    <span class="position-absolute" onclick="togglePassword()" style="top: 35px; right: 20px; cursor: pointer;">
                        <i id="togglePasswordIcon" class="bi bi-eye" style="font-size: 1.2rem;"></i>
                    </span>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                    <select name="role" class="form-select shadow-sm" required>
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>user</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>User</option>
                    </select>
                    <div class="invalid-feedback">Please select a role.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Profile Image</label>
                    <input type="file" name="image" class="form-control shadow-sm" accept="image/*">
                    @if($user->image)
                        <div class="mt-2">
                            <img src="{{ asset($user->image) }}" alt="Current Image" width="100"
                                 class="rounded shadow-sm border">
                        </div>
                    @endif
                </div>

                <div class="col-12 mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Update user
                    </button>
                    <a href="{{ route('users-list.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- JS for password toggle --}}
<script>
    function togglePassword() {
        const passwordInput = document.getElementById("passwordField");
        const icon = document.getElementById("togglePasswordIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection
