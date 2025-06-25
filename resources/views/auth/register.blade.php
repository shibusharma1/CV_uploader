<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Registration | CV Uploader</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f0f4f8, #d9e2ec);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        .card h2 {
            font-weight: 600;
            color: #0d6efd;
        }

        .input-group-text {
            background: #e9ecef;
            border: none;
            border-radius: 8px 0 0 8px;
        }

        .form-control {
            border-radius: 0 8px 8px 0;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            background: linear-gradient(45deg, #0d6efd, #2563eb);
            border: none;
            padding: 12px;
            font-weight: 600;
            transition: background 0.3s ease;
            border-radius: 50px;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #2563eb, #0d6efd);
        }

        .form-check-label a {
            color: #0d6efd;
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        small.text-muted {
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="text-center mb-3">Scholarship Registration</h2>
                        <p class="text-center text-muted mb-4">Apply for a scholarship by completing the form below.</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label class="form-label">Full Name (English)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name_en" class="form-control" placeholder="Enter your full name" required value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="phone" class="form-control" placeholder="98XXXXXXXX" required value="{{ old('phone') }}">
                                </div>
                                <small class="text-muted ms-1">Enter a valid 10-digit Nepali mobile number.</small>
                                @error('phone')
                                    <br><small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Create a strong password" required>
                                </div>
                                <small class="text-muted ms-1">At least 8 characters with numbers and symbols.</small>
                                @error('password')
                                    <br><small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter your password" required>
                                </div>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#">Terms & Conditions</a>.
                                </label>
                                @error('terms')
                                    <br><small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send-fill me-2"></i>Submit Application
                            </button>

                            <p class="mt-3 text-center text-muted">
                                Already registered? <a href="{{ route('login') }}" class="fw-semibold">Login here</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
