@extends('layout.app')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h2>Upload Your CV, Get Approved, <span>Land Your Dream Job</span></h2>
                <p>CVUploader simplifies the job application process by providing a platform to upload, manage, and get
                    your CV approved by professionals. Stand out to employers with a verified resume.</p>
                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="btn btn-primary">Upload Your CV</a>
                    <a href="#how-it-works" class="btn btn-outline">How It Works</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&h=400&q=80"
                    alt="CV Uploader Dashboard">
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
                <p>Create your account in seconds with our simple registration process. Start managing your CV
                    immediately.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-upload"></i>
                </div>
                <h3>CV Upload</h3>
                <p>Upload your CV in multiple formats. Our system will parse and organize your information
                    automatically.</p>
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
<section class="how-it-works" id="how-it-works">
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
                <p>"CVUploader made the job application process so much easier. After getting my CV approved, I received
                    three interview requests in the first week!"</p>
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
            <a href="{{ route('register') }}" class="btn btn-light">Get Started Now</a>
            <a href="#" class="btn btn-transparent">Schedule a Demo</a>
        </div>
    </div>
</section>
@endsection