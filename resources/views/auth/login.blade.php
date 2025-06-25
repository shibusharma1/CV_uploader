@extends('layout.app')

@section('content')
<style>
    .login-body {
        /* min-height: 100vh; */
        display: flex;
        align-items: center;
        justify-content: center;    
        background-color: #f8f9fa;
    }

    .login-container {
        width: 100%;
        max-width: 420px;
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.06);
    }

    .form-heading {
        font-size: 1.75rem;
        font-weight: 600;
        color: #092448;
    }

    .form-subtitle {
        font-size: 0.95rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }

    .form-label-custom {
        font-weight: 500;
        color: #343a40;
    }

    .form-control-custom {
        border-radius: 0.375rem;
        height: 45px;
    }

    .btn-login {
        width: 100%;
        background-color: #092448;
        color: #fff;
        font-weight: 500;
        padding: 0.6rem;
        border-radius: 0.375rem;
    }

    .btn-login:hover {
        background-color: #061b33;
    }

    .link-text {
        text-align: center;
        font-size: 0.9rem;
        color: #495057;
    }

    .link-text a {
        color: #092448;
        text-decoration: none;
        font-weight: 500;
    }

    .link-text a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-body">
    <div class="login-container">
        <h2 class="form-heading text-center">Welcome Back!</h2>
        <p class="form-subtitle text-center">Sign in to continue to your dashboard.</p>

        <form id="loginForm" action="{{ route('login') }}" method="POST" class="p-1">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label form-label-custom">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control form-control-custom"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label form-label-custom">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control form-control-custom"
                    required
                />
            </div>
            <button type="submit" class="btn btn-login mt-2">Login</button>
        </form>

        <p class="link-text mt-3">
            Don't have an account? <a href="/register">Register here</a>
        </p>
        <p class="link-text mt-2">
            <a href="/forgot-password">Forgot password?</a>
        </p>
    </div>
</div>
@endsection
