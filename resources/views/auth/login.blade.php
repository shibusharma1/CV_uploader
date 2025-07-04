@extends('layout.app')
@section('title', 'Login')
@section('content')

@if (Auth::check())
<script>
    window.location.href = "{{ route('logout') }}";
</script>
@endif

<div class="row g-0 align-items-center">
    {{-- Left: Login Form --}}
    <div class="col-12 col-md-6">
        <div class="auth-wrapper">
            <div class="auth-box">

                <h2 class="auth-title text-center mb-1">Welcome Back!</h2>
                <p class="auth-subtitle text-center">Sign in to continue to your dashboard.</p>

                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label auth-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control auth-input" required>
                        @error('email')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label auth-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control auth-input pr-5"
                            required>
                        <span class="position-absolute" style="top: 38px; right: 15px; cursor: pointer;"
                            onclick="togglePassword()">
                            <i id="eyeIcon" class="bi bi-eye" style="font-size: 1.25rem;"></i>
                        </span>
                        @error('password')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn auth-btn mt-2">Login</button>
                </form>

                <p class="auth-link mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                <p class="auth-link mt-2"><a href="#">Forgot password?</a></p>
            </div>
        </div>
    </div>

    {{-- Right: Video --}}
    <div class="col-12 col-md-6">
        <div class="auth-wrapper">
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/g7MEOCu9XN8"
                    title="Biratnagar Scholarship Video Manual" frameborder="0" allowfullscreen
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
}

</script>
@endsection