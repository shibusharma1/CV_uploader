<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header d-flex flex-row align-items-center justify-content-between text-center" style="background: #F5F7FB;">
        <div class="app-logo d-flex flex-row align-items-center">
            {{-- <i class="bi bi-file-earmark-person"></i> --}}
            <img src="{{ asset('Biratnagar_logo.png') }}" alt="Logo" class="logo" height="30" width="30">
            <h5 class="px-3 mb-0">BRT Scholarship</h5>
        </div>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>
        @auth
        @if(Auth::user()->role === 0)
        <li class="nav-item">
            <a href="{{ route('admins.index')}}" class="nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Admins
            </a>
        </li>
        @endif
        @endauth
        <li class="nav-item">
            <a href="{{ url('users-list')}}" class="nav-link {{ request()->routeIs('users-list.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('applicants/applicant-list')}}" class="nav-link {{ request()->routeIs('applicants.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                Applications
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/settings-list') }}" class="nav-link  {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i>
                Settings
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>