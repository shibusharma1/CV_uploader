@extends('layout.app')
@section('title', 'Email Verification')
@section('content')

@php
    use Illuminate\Support\Facades\Auth;

    if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
        header('Location: ' . route('user.dashboard'));
        exit;
    }
@endphp

<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="text-center">
        <h2>Email Verification Required</h2>
        <p>Please check your email and verify your account to proceed.</p>

        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Resend Verification Email</button>
        </form>
    </div>
</div>
@endsection
