@extends('layout.app')

@section('title', 'Application Pending')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-warning shadow">
                <div class="card-header bg-warning text-dark fw-bold d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Application Under Review
                </div>

                <div class="card-body text-center">
                    <img src="{{ asset('pending_review.png') }}" alt="Pending" class="img-fluid mb-4" style="max-height: 200px;">

                    <h4 class="text-dark">Your scholarship application has been submitted successfully.</h4>

                    <p class="text-muted mt-3 mb-4">
                        Thank you for applying for the scholarship program. <br>
                        Your application is currently <strong>under review</strong>.
                    </p>

                    <div class="alert alert-info">
                        Please wait while we verify your information. <br>
                        Once approved, you will be able to download your <strong>Admit Card</strong> and appear in the scholarship exam.
                    </div>
{{-- 
                    <a href="{{ route('home') }}" class="btn btn-outline-primary mt-3">
                        <i class="bi bi-arrow-left"></i> Back to Dashboard
                    </a> --}}
                </div>

                <div class="card-footer text-muted text-center">
                    If you have any questions, please contact support.
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
