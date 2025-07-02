<form method="POST" action="{{ route('forgot.password.verifyOtp') }}">
    @csrf
    <label>Enter OTP:</label>
    <input type="text" name="otp" required>
    <button type="submit">Verify</button>
</form>
