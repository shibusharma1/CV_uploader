<form method="POST" action="{{ route('forgot.password.reset') }}">
    @csrf
    <label>New Password:</label>
    <input type="password" name="password" required>

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Reset Password</button>
</form>
