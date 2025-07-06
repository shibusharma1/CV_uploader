@extends('layout.app')
@section('title', 'Forget Password')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 450px; width: 100%;">
        <h4 class="text-center mb-4 text-primary fw-bold">Forgot Password</h4>

        <form action="{{ route('forgot.password.sendOtp') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="identifier" class="form-label fw-semibold">Phone or Email</label>
                <input type="text" 
                       class="form-control rounded-pill px-4 py-2 @error('identifier') is-invalid @enderror" 
                       name="identifier" 
                       id="identifier" 
                       placeholder="Enter your phone number or email" 
                       required>

                @error('identifier')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-semibold">
                    Send OTP
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
