@extends('layout.app')
@section('title', 'Reset Password')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 450px; width: 100%;">
        <h4 class="text-center mb-4 text-primary fw-bold">Reset Your Password</h4>

        <form action="{{ route('forgot.password.reset') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">New Password</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="form-control rounded-pill px-4 py-2 @error('password') is-invalid @enderror" 
                       placeholder="Enter new password" 
                       required>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                <input type="password" 
                       name="password_confirmation" 
                       id="password_confirmation" 
                       class="form-control rounded-pill px-4 py-2" 
                       placeholder="Re-enter password" 
                       required>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-semibold">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
