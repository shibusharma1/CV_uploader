<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


@if(session('success'))<div>{{ session('success') }}</div>@endif
<form action="{{ route('verification.phone.submit') }}" method="POST">
    @csrf
    <input name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify</button>
</form>
<form action="{{ route('verification.phone.send') }}" method="POST" class="mt-2">
    @csrf
    <button type="submit">Resend OTP</button>
</form>

</body>

</html>