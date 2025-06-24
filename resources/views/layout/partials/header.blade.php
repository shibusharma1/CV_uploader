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
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#">Features</a></li>
                {{-- <li><a href="#">Pricing</a></li> --}}
                <li><a href="#">Contact</a></li>
            </ul>
            @auth
            <div class="auth-buttons">
                <div class="dropdown">
                    <a href="#" class="btn btn-outline dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ strtok(Auth::user()->name_en, ' ') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown" style="display: none;">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>



            @else
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
            @endauth
        </nav>
    </div>
</header>