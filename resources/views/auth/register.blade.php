<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">

</head>
<body>
    <div class="container">
        <div class="register-container p-5">
            <div class="row g-0">
                <!-- Left Column - Visual Header -->
                <div class="col-lg-5">
                    <div class="register-header h-100 d-flex flex-column justify-content-center">
                        <h1 class="mb-4">Create Account</h1>
                        <p class="lead mb-0">Join our community to unlock exclusive features and personalized experiences.</p>
                        <div class="mt-5">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Access premium content</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Personalized recommendations</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Sync across all devices</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Registration Form -->
                <div class="col-lg-7">
                    <div class="register-form">
                        <h2 class="mb-4">Register</h2>

                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-3 form-floating position-relative">
                                
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
                                <label for="name">Full Name</label>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3 form-floating position-relative">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                <label for="email">Email Address</label>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3 form-floating position-relative">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <label for="password">Password</label>
                                <div class="password-strength mt-2" id="password-strength"></div>
                                <div class="password-instructions">
                                    <small>Use 8+ characters with a mix of letters, numbers & symbols</small>
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-4 form-floating position-relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                <label for="password_confirmation">Confirm Password</label>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="login-link">Terms of Service</a> and <a href="#" class="login-link">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-register btn-lg">Sign Up
                                </button>
                            </div>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="login-link">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Password Strength Indicator -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength');

            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                // Cap at 4 (because 5 criteria, but CSS strength-4 is max)
                strength = Math.min(strength, 4);

                // Update strength bar class
                strengthBar.className = 'password-strength strength-' + strength;
            });
        });
    </script>
</body>
</html>
