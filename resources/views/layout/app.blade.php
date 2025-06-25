<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schoolarship Form | Biratnagar Metropolitan City</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/'.$settings->fav_icon) }}">
    <link rel="icon" type="image/png" href="{{ asset('Biratnagar_logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- sweet alert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    @include('layout.partials.header')
    @yield('content')
    @include('layout.partials.footer')