@extends('layout.app')
@section('title', 'Verify OTP')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 450px; width: 100%;">
        <h4 class="text-center mb-4 text-primary fw-bold">Verify OTP</h4>

        <form action="{{ route('forgot.password.verifyOtp') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="otp" class="form-label fw-semibold">One-Time Password (OTP)</label>
                <input type="text" 
                       name="otp" 
                       id="otp" 
                       class="form-control rounded-pill px-4 py-2 @error('otp') is-invalid @enderror" 
                       placeholder="Enter the OTP you received" 
                       required>

                @error('otp')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success rounded-pill py-2 fw-semibold">
                    Verify OTP
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
