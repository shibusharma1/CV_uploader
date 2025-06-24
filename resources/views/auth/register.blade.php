<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | CV Uploader</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1d4ed8;
            --accent-color: #3b82f6;
            --light-bg: #f8fafc;
            --dark-color: #1e293b;
            --success-color: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            max-width: 1200px;
            margin: 30px auto;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }

        .register-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-header h1 {
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 2.2rem;
        }

        .register-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .benefit-list {
            margin-top: 30px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .benefit-icon {
            background: rgba(255, 255, 255, 0.15);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .benefit-content p {
            margin-bottom: 0;
            opacity: 0.85;
            font-size: 1rem;
            line-height: 1.5;
        }

        .register-form {
            padding: 40px;
            background: white;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        .form-header p {
            color: #64748b;
            font-size: 1.05rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        .input-with-icon {
            position: relative;
        }

        .form-control {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 14px 20px 14px 50px;
            width: 100%;
            height: auto;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 1.2rem;
            z-index: 2;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #64748b;
            z-index: 3;
        }

        .password-strength {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            margin-top: 8px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease;
        }

        .strength-1 {
            width: 25%;
            background: #dc2626;
        }

        .strength-2 {
            width: 50%;
            background: #f59e0b;
        }

        .strength-3 {
            width: 75%;
            background: #3b82f6;
        }

        .strength-4 {
            width: 100%;
            background: #10b981;
        }

        .password-instructions {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 5px;
        }

        .terms-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .terms-container input {
            margin-top: 5px;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .terms-container label {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .terms-container a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .terms-container a:hover {
            text-decoration: underline;
        }

        .btn-register {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .login-link {
            text-align: center;
            color: #64748b;
            font-size: 1rem;
        }

        .login-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* CV Uploader specific additions */
        .cv-highlight {
            color: #ffd700;
            font-weight: 600;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .register-header {
                padding: 30px;
            }

            .register-form {
                padding: 30px;
            }

            .register-header h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .register-container {
                max-width: 95%;
            }

            .register-header {
                padding: 25px;
            }

            .register-form {
                padding: 25px;
            }

            .benefit-icon {
                width: 40px;
                height: 40px;
                margin-right: 12px;
            }

            .benefit-content p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .form-header h2 {
                font-size: 1.6rem;
            }

            .form-header p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="register-container">
            <div class="row g-0">
                <!-- Left Column - Visual Header -->
                <div class="col-lg-5">
                    <div class="register-header">
                        <h1>Launch Your Career Journey</h1>
                        <p>Create your professional profile to connect with top employers and unlock new opportunities
                        </p>

                        <div class="benefit-list">
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                </div>
                                <div class="benefit-content">
                                    <p><span class="cv-highlight">Upload your CV</span> to make it visible to thousands
                                        of recruiters</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <div class="benefit-content">
                                    <p>Get matched with <span class="cv-highlight">relevant job opportunities</span>
                                        based on your profile</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-bell"></i>
                                </div>
                                <div class="benefit-content">
                                    <p>Receive <span class="cv-highlight">personalized job alerts</span> for new
                                        openings in your field</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                                <div class="benefit-content">
                                    <p><span class="cv-highlight">Track applications</span> and get insights to improve
                                        your job search</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Registration Form -->
                <div class="col-lg-7">
                    <div class="register-form">
                        <div class="form-header">
                            <h2>Create Your Professional Account</h2>
                            <p>Build your career profile in just 60 seconds</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" name="name_en" id="name" class="form-control"
                                        placeholder="Enter your full name" required value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter your email" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password" class="form-label">Create Secure Password</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-lock input-icon"></i>
                                    <div class="password-container">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Create a password" required>
                                        <span class="password-toggle" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="password-strength">
                                    <div class="strength-bar" id="strength-bar"></div>
                                </div>
                                <div class="password-instructions">
                                    <small>Use 8+ characters with a mix of uppercase, lowercase, numbers &
                                        symbols</small>
                                </div>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-shield-lock input-icon"></i>
                                    <div class="password-container">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Confirm your password" required>
                                        <span class="password-toggle" id="toggleConfirmPassword">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Terms Agreement -->
                            <div class="terms-container">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required {{
                                    old('terms') ? 'checked' : '' }}>
                                <label for="terms">
                                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>,
                                    and consent to my profile being shared with potential employers.
                                </label>
                                @error('terms')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-register">
                                <i class="bi bi-person-badge me-2"></i>Create Profile
                            </button>

                            <div class="login-link">
                                Already have a profile? <a href="{{ route('login') }}">Sign in to your
                                    account</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('strength-bar');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPassword = document.getElementById('password_confirmation');
            
            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                let strength = 0;
                
                // Check password length
                if (password.length >= 8) strength += 1;
                
                // Check for lowercase letters
                if (/[a-z]/.test(password)) strength += 1;
                
                // Check for uppercase letters
                if (/[A-Z]/.test(password)) strength += 1;
                
                // Check for numbers
                if (/\d/.test(password)) strength += 1;
                
                // Check for special characters
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;
                
                // Cap strength at 4
                strength = Math.min(strength, 4);
                
                // Update strength bar
                strengthBar.className = 'strength-bar strength-' + strength;
            });
            
            // Password visibility toggle
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
            
            // Confirm password visibility toggle
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);
                
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        });
    </script>
</body>

</html>