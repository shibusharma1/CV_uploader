        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center">
                {{-- <button type="button" id="sidebarCollapse" class="btn">
                    <i class="bi bi-list"></i>
                </button> --}}
                <div class="search-bar">
                    <i class="bi bi-search"></i>
                    <input type="hidden" class="form-control" placeholder="Search...">
                </div>
            </div>

            <div class="topbar-right">
                {{-- <a href="#" class="notification-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">5</span>
                </a>
                <a href="#" class="message-btn">
                    <i class="bi bi-chat"></i>
                    <span class="notification-badge">3</span>
                </a> --}}
                <div class="dropdown user-dropdown">
                    <button class="btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin">
                        <span>Admin User</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>