@extends('layout.admin.app')
@section('title', 'Add Admin')

@section('content')
<div id="content">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h1 class="page-title m-0 fw-bold text-primary">Add Admin</h1>
            <a href="{{ route('admins.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <form id="adminForm" action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white border p-4 rounded shadow-sm">
            @csrf
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
                    <input type="text" name="name_en" class="form-control shadow-sm" required
                        placeholder="Enter full name in English">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control shadow-sm" required
                        placeholder="example@example.com">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" class="form-control shadow-sm" placeholder="9800000000">
                </div>

                <div class="col-md-6 position-relative">
                    <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="passwordField" class="form-control shadow-sm" required
                        placeholder="Enter password">

                    <span class="position-absolute" onclick="togglePassword()"
                        style="top: 35px; right: 20px; cursor: pointer;">
                        <i id="togglePasswordIcon" class="bi bi-eye" style="font-size: 1.2rem;"></i>
                    </span>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                    <select name="role" class="form-select shadow-sm" required>
                        {{-- <option value="0">Super Admin</option> --}}
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Profile Image</label>
                    <input type="file" name="image" class="form-control shadow-sm" accept="image/*">
                </div>

                <div class="col-12 mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-success px-4 shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Create User
                    </button>
                    <a href="#" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Password Toggle Script --}}
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

{{-- Client-side Validation Script --}}
<script>
    document.getElementById("adminForm").addEventListener("submit", function (e) {
        let form = e.target;
        let name = form.name_en.value.trim();
        let email = form.email.value.trim();
        let phone = form.phone.value.trim();
        let password = form.password.value.trim();
        let role = form.role.value;

        // Name Validation
        if (name.length < 2) {
            alert("Please enter a valid name (minimum 2 characters).");
            form.name_en.focus();
            e.preventDefault();
            return false;
        }

        // Email Validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            form.email.focus();
            e.preventDefault();
            return false;
        }

        // Phone Validation (optional but if filled, must be valid)
        if (phone !== "" && !/^[9][6-8][0-9]{8}$/.test(phone)) {
            alert("Please enter a valid Nepali phone number starting with 98/97/96.");
            form.phone.focus();
            e.preventDefault();
            return false;
        }

        // Password Validation
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            form.password.focus();
            e.preventDefault();
            return false;
        }

        // Role Validation
        if (role !== "1" && role !== "2") {
            alert("Please select a valid role.");
            form.role.focus();
            e.preventDefault();
            return false;
        }

        // If all validations pass, allow form to submit
        return true;
    });
</script>
@endsection