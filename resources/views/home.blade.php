@extends('layout.app')

@section('title', 'Login')
@section('content')
<div class="auth-wrapper">
    <div class="auth-box">
        <h2 class="auth-title text-center mb-1">Welcome Back!</h2>
        <p class="auth-subtitle text-center">Sign in to continue to your dashboard.</p>

        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label auth-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control auth-input" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label auth-label">Password</label>
                <input type="password" id="password" name="password" class="form-control auth-input" required>
            </div>

            <button type="submit" class="btn auth-btn mt-2">Login</button>
        </form>

        <p class="auth-link mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        <p class="auth-link mt-2"><a href="#">Forgot password?</a></p>
    </div>
</div>
@endsection