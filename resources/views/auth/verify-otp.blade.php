@extends('layout.app')
@section('title', 'Verify your Phone Number')
@section('content')
<div class="container">
    <h4>Verify Your Phone Number</h4>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <div class="form-group">
            <label for="otp">Enter the OTP sent to your phone</label>
            <input type="text" name="otp" id="otp" class="form-control" required maxlength="6">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Verify</button>
    </form>
</div>
@endsection
