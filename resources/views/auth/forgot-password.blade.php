<form method="POST" action="{{ route('forgot.password.sendOtp') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Send OTP</button>
</form>

