<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVUploader | Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fb 0%, #e4edff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 50px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .login-header::after {
            content: "";
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }
        
        .login-header h1 {
            font-weight: 700;
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
        }
        
        .login-header p {
            opacity: 0.9;
            position: relative;
            z-index: 1;
            margin-bottom: 2rem;
        }
        
        .login-header .feature-item {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 15px;
            backdrop-filter: blur(5px);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .login-header .feature-item:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(5px);
        }
        
        .login-form {
            padding: 50px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .app-logo {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            font-weight: 700;
            color: var(--primary);
        }
        
        .app-logo i {
            font-size: 24px;
            margin-right: 8px;
        }
        
        .login-form h2 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-floating {
            position: relative;
            margin-bottom: 1.25rem;
        }
        
        .form-control {
            border: 2px solid var(--light-gray);
            height: 60px;
            border-radius: 12px;
            padding-left: 20px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .form-floating label {
            padding: 0 20px;
            color: var(--gray);
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            z-index: 10;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0 2rem;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-login {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border: none;
            height: 60px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }
        
        .decoration-line {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--gray);
        }
        
        .decoration-line::before,
        .decoration-line::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--light-gray);
        }
        
        .decoration-line span {
            padding: 0 15px;
        }
        
        .social-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .google-btn {
            background: #fff;
            border: 1px solid #ddd;
            color: #757575;
        }
        
        .google-btn:hover {
            background: #f8f9fa;
            color: var(--dark);
        }
        
        .facebook-btn {
            background: #3b5998;
            color: white;
        }
        
        .facebook-btn:hover {
            background: #334d84;
            color: white;
        }
        
        .twitter-btn {
            background: #1da1f2;
            color: white;
        }
        
        .twitter-btn:hover {
            background: #1a91da;
            color: white;
        }
        
        .register-link {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .register-link:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .brand-text {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            z-index: 1;
        }
        
        /* Responsive adjustments */
        @media (max-width: 991px) {
            .login-header, .login-form {
                padding: 30px;
            }
            
            .login-header h1 {
                font-size: 1.75rem;
            }
            
            .login-header p {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            .login-container {
                border-radius: 15px;
            }
            
            .login-header, .login-form {
                padding: 40px 20px;
            }
            
            .login-header h1 {
                font-size: 1.5rem;
            }
            
            .login-form h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .form-control {
                height: 55px;
            }
            
            .btn-login {
                height: 55px;
                font-size: 1rem;
            }
            
            .remember-forgot {
                margin: 1rem 0 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
            }
            
            .login-header, .login-form {
                padding: 30px 15px;
            }
            
            .social-btn {
                height: 45px;
                font-size: 0.9rem;
            }
        }
        
        /* Alignment improvements */
        .form-floating .bi {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            z-index: 2;
            pointer-events: none;
        }
        
        .feature-item .d-flex {
            align-items: center;
        }
        
        .login-form-content {
            max-width: 500px;
            margin: 0 auto;
            width: 100%;
        }
        
        .social-login .row {
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="row g-0">
                <!-- Left Column - Visual Header -->
                <div class="col-lg-6 d-none d-lg-flex">
                    <div class="login-header h-100">
                        <div class="app-logo">
                            <i class="bi bi-file-earmark-person"></i>
                            <span>CVUPLOADER</span>
                        </div>
                        
                        <h1 class="mb-4">Welcome Back</h1>
                        <p class="lead mb-5">Sign in to continue your journey with CVUploader</p>
                        
                        <div class="mt-3">
                            <div class="feature-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-3"></i>
                                    <span>Access your professional dashboard</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-3"></i>
                                    <span>Upload and manage your CVs</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-3"></i>
                                    <span>Track approval status</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-3"></i>
                                    <span>Get matched with job opportunities</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="brand-text mt-auto">
                            Professional CV Management Platform
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Login Form -->
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="app-logo mb-4 d-none d-md-flex d-lg-none">
                            <i class="bi bi-file-earmark-person"></i>
                            <span>CVUPLOADER</span>
                        </div>
                        
                        <div class="login-form-content">
                            <h2 class="mb-4">Sign In to Your Account</h2>
                            
                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <!-- Email Field -->
                                <div class="mb-4 form-floating position-relative">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                    <label for="email">Email Address</label>
                                    <i class="bi bi-envelope text-muted"></i>
                                </div>
                                
                                <!-- Password Field -->
                                <div class="mb-4 form-floating position-relative">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                                </div>
                                
                                <!-- Remember & Forgot Password -->
                                <div class="remember-forgot">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        <a href="#" class="register-link">Forgot Password?</a>
                                    </div>
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-login btn-lg text-white">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                                    </button>
                                </div>
                                
                                <!-- Divider -->
                                <div class="decoration-line">
                                    <span>or continue with</span>
                                </div>
                                
                                <!-- Social Login Options -->
                                <div class="social-login">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <a href="#" class="social-btn google-btn text-decoration-none">
                                                <i class="bi bi-google me-2"></i> Google
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="social-btn facebook-btn text-decoration-none">
                                                <i class="bi bi-facebook me-2"></i> Facebook
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Registration Link -->
                                <div class="text-center mt-5">
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="register-link">Register Now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Password Visibility Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle the icon
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        });
    </script>
</body>
</html>