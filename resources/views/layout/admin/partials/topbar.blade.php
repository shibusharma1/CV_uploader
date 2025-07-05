<!-- Topbar -->
<nav class="topbar navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3">
    <div class="container-fluid">

        <!-- Left Side: Logo + App Name -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('Biratnagar_logo.png') }}" alt="Logo" width="32" height="32" class="me-2">
            <span class="fw-bold text-primary"> BRT Scholarship</span>
        </a>

        <!-- Toggler for Mobile View (on right by default, can use ms-auto to push further) -->
        <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#topbarDropdown" aria-controls="topbarDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>
        <!-- Right Section -->
        <div class="collapse navbar-collapse justify-content-end mt-2 mt-lg-0" id="topbarDropdown">
            <ul class="navbar-nav align-items-center ms-auto">



                {{-- Navigation Items (hidden in md-down, collapsible on toggler) --}}
                <li class="nav-item d-lg-none">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active fw-bold text-primary' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                @auth
                @if(Auth::user()->role === 0)
                <li class="nav-item d-lg-none">
                    <a href="{{ route('admins.index') }}"
                        class="nav-link {{ request()->routeIs('admins.*') ? 'active fw-bold text-primary' : '' }}">
                        <i class="bi bi-people me-2"></i> Admins
                    </a>
                </li>
                @endif
                @endauth
                <li class="nav-item d-lg-none">
                    <a href="{{ url('users-list') }}"
                        class="nav-link {{ request()->routeIs('users-list.*') ? 'active fw-bold text-primary' : '' }}">
                        <i class="bi bi-people me-2"></i> Users
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="{{ url('applicants/applicant-list') }}"
                        class="nav-link {{ request()->routeIs('applicants.*') ? 'active fw-bold text-primary' : '' }}">
                        <i class="bi bi-file-earmark-text me-2"></i> Applications
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="{{ url('/settings-list') }}"
                        class="nav-link {{ request()->routeIs('settings.*') ? 'active fw-bold text-primary' : '' }}">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="{{ route('logout') }}" class="nav-link text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
                {{-- User Info Dropdown (visible on all sizes) --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('Biratnagar_logo.png') }}" alt="{{ Auth::user()->name_en }}"
                            class="rounded-circle me-2" width="32" height="32">
                        <span class="d-md-inline fw-semibold">{{ Auth::user()->name_en }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                        <li>
                            <h6 class="dropdown-header text-primary fw-bold">Hi, {{ Auth::user()->name_en }}</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person me-2"></i>
                                Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('settings.edit') }}"><i class="bi bi-gear me-2"></i>
                                Settings</a></li>
                        <li class="d-none d-lg-block">
                            <hr class="dropdown-divider">
                        </li>
                        <li class="d-none d-lg-block"><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                    class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>