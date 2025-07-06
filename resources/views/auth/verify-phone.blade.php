@extends('layout.app')
@section('title', 'Verify Phone Number')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 450px; width: 100%;">
        <h4 class="text-center text-primary fw-bold mb-4">Verify Your Phone Number</h4>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- OTP Verification Form --}}
        <form action="{{ route('verification.phone.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="otp" class="form-label fw-semibold">Enter OTP</label>
                <input type="text" 
                       name="otp" 
                       id="otp" 
                       class="form-control rounded-pill px-4 py-2 @error('otp') is-invalid @enderror" 
                       placeholder="One-Time Password" 
                       required>

                @error('otp')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success rounded-pill py-2 fw-semibold">
                    Verify Phone
                </button>
            </div>
        </form>

        {{-- Resend OTP --}}
        <form action="{{ route('verification.phone.send') }}" method="POST" class="mt-3">
            @csrf
            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary rounded-pill py-2 fw-semibold">
                    Resend OTP
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
