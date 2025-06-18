<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-file-contract"></i>
                    <h1>CV Uploader</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Features</a></li>
                    {{-- <li><a href="#">Pricing</a></li> --}}
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Upload Your CV, Get Approved, <span>Land Your Dream Job</span></h2>
                    <p>CVUploader simplifies the job application process by providing a platform to upload, manage, and get your CV approved by professionals. Stand out to employers with a verified resume.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Upload Your CV</a>
                        <a href="#" class="btn btn-outline">How It Works</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&h=400&q=80" alt="CV Uploader Dashboard">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Powerful Features</h2>
                <p>Everything you need to manage and optimize your CV for job applications</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Easy Registration</h3>
                    <p>Create your account in seconds with our simple registration process. Start managing your CV immediately.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-upload"></i>
                    </div>
                    <h3>CV Upload</h3>
                    <p>Upload your CV in multiple formats. Our system will parse and organize your information automatically.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h3>Admin Approval</h3>
                    <p>Our professional admin team reviews and approves CVs to ensure quality and completeness.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Job Matching</h3>
                    <p>Get matched with relevant job opportunities based on your skills and experience.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Performance Tracking</h3>
                    <p>Track how many employers view your CV and receive notifications when you're shortlisted.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile Friendly</h3>
                    <p>Access your dashboard and upload CVs from any device, anywhere at any time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Get your CV approved and job-ready in just a few simple steps</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Register Account</h3>
                    <p>Create your personal account with your email and basic information.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Upload Your CV</h3>
                    <p>Submit your resume through our simple upload form with all required details.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Admin Approval</h3>
                    <p>Our team reviews your CV and approves it within 24-48 hours.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Get Hired</h3>
                    <p>Apply for jobs with your approved CV and get noticed by employers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Success Stories</h2>
                <p>Hear from users who landed their dream jobs through CVUploader</p>
            </div>
            <div class="testimonial-container">
                <div class="testimonial">
                    <p>"CVUploader made the job application process so much easier. After getting my CV approved, I received three interview requests in the first week!"</p>
                    <div class="client">
                        <div class="client-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="client-info">
                            <h4>Sarah Johnson</h4>
                            <p>Marketing Manager at TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Boost Your Career?</h2>
            <p>Join thousands of professionals who have enhanced their job prospects with CVUploader</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-light">Get Started Now</a>
                <a href="#" class="btn btn-transparent">Schedule a Demo</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="logo">
                        <i class="fas fa-file-contract"></i>
                        <h3>CVUploader</h3>
                    </div>
                    <p>The professional platform for CV management and job application optimization.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">How It Works</a></li>
                        {{-- <li><a href="#">Pricing</a></li> --}}
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        {{-- <li><a href="#">CV Templates</a></li> --}}
                        <li><a href="#">Career Advice</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> support@cvuploader.com</li>
                        <li><i class="fas fa-phone"></i> +977 98XXXXXXXX</li>
                        <li><i class="fas fa-map-marker-alt"></i> Biratnagar</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} CVUploader. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Feature cards animation
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>