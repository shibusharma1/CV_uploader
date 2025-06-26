<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVUploader | User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            flex: 1;
        }
        
        /* Sidebar */
        .dashboard-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            height: 70px;
            display: flex;
            align-items: center;
        }
        
        .sidebar-header h3 {
            font-weight: 700;
            margin-bottom: 0;
            white-space: nowrap;
        }
        
        .app-logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }
        
        .app-logo i {
            font-size: 28px;
            margin-right: 10px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
            border-radius: 0;
            transition: all 0.2s;
            font-weight: 500;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .nav-link i {
            margin-right: 15px;
            font-size: 20px;
            min-width: 24px;
            text-align: center;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .nav-link .link-text {
            transition: opacity 0.3s;
        }
        
        .sidebar-footer {
            padding: 20px;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Main Content */
        .dashboard-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Topbar */
        .topbar {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .toggle-sidebar {
            background: var(--light);
            border: none;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--dark);
            margin-right: 15px;
        }
        
        .search-bar {
            width: 350px;
            position: relative;
        }
        
        .search-bar input {
            border-radius: 50px;
            padding-left: 45px;
        }
        
        .search-bar i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .topbar-right {
            display: flex;
            align-items: center;
        }
        
        .notification-btn, .message-btn {
            position: relative;
            margin-right: 15px;
            color: var(--dark);
            font-size: 20px;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--warning);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-dropdown .btn {
            display: flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 50px;
            background: var(--light);
            border: none;
        }
        
        .user-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        
        /* Content Wrapper */
        .content-wrapper {
            padding: 30px;
            flex: 1;
        }
        
        .content-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .content-section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Dashboard Cards */
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s;
            height: 100%;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        .stats-card.card-success {
            border-left-color: var(--success);
        }
        
        .stats-card.card-warning {
            border-left-color: var(--warning);
        }
        
        .stats-card.card-accent {
            border-left-color: var(--accent);
        }
        
        .stats-card .card-title {
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .stats-card .card-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .stats-card .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary);
            background: rgba(67, 97, 238, 0.1);
            float: right;
        }
        
        .stats-card.card-success .card-icon {
            color: var(--success);
            background: rgba(76, 201, 240, 0.1);
        }
        
        .stats-card.card-warning .card-icon {
            color: var(--warning);
            background: rgba(247, 37, 133, 0.1);
        }
        
        .stats-card.card-accent .card-icon {
            color: var(--accent);
            background: rgba(72, 149, 239, 0.1);
        }
        
        /* CV Status */
        .status-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s;
        }
        
        .status-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        .status-card.pending {
            border-left-color: #ffc107;
        }
        
        .status-card.approved {
            border-left-color: var(--success);
        }
        
        .status-card.rejected {
            border-left-color: var(--warning);
        }
        
        .status-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .cv-title {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 5px;
        }
        
        .cv-meta {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .badge-pending {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
        }
        
        .badge-approved {
            background: rgba(76, 201, 240, 0.15);
            color: var(--success);
        }
        
        .badge-rejected {
            background: rgba(247, 37, 133, 0.15);
            color: var(--warning);
        }
        
        /* Loading Indicator */
        .loading-indicator {
            display: none;
            text-align: center;
            padding: 40px;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(67, 97, 238, 0.2);
            border-top: 5px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .dashboard-sidebar {
                width: var(--sidebar-collapsed);
            }
            
            .dashboard-sidebar .link-text {
                opacity: 0;
                position: absolute;
                left: -100px;
            }
            
            .dashboard-sidebar .sidebar-header h3,
            .dashboard-sidebar .sidebar-footer {
                display: none;
            }
            
            .dashboard-content {
                margin-left: var(--sidebar-collapsed);
            }
            
            .dashboard-sidebar.expanded {
                width: var(--sidebar-width);
            }
            
            .dashboard-sidebar.expanded .link-text {
                opacity: 1;
                position: static;
            }
            
            .dashboard-sidebar.expanded .sidebar-header h3,
            .dashboard-sidebar.expanded .sidebar-footer {
                display: block;
            }
            
            .dashboard-content.expanded {
                margin-left: var(--sidebar-width);
            }
        }
        
        @media (max-width: 768px) {
            .search-bar {
                width: 200px;
            }
            
            .topbar {
                padding: 15px;
            }
            
            .content-wrapper {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .topbar {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                width: 100%;
                margin-top: 15px;
            }
            
            .topbar-right {
                margin-left: auto;
            }
            
            .content-wrapper {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="dashboard-sidebar">
            <div class="sidebar-header">
                <a href="#" class="app-logo">
                    <i class="bi bi-file-earmark-person"></i>
                    <h3>CVUploader</h3>
                </a>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-section="dashboard">
                        <i class="bi bi-house"></i>
                        <span class="link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-section="cvs">
                        <i class="bi bi-file-earmark"></i>
                        <span class="link-text">My CVs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-section="notifications">
                        <i class="bi bi-bell"></i>
                        <span class="link-text">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profileSection" data-section="profile">
                        <i class="bi bi-person"></i>
                        <span class="link-text">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-section="settings">
                        <i class="bi bi-gear"></i>
                        <span class="link-text">Settings</span>
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="d-grid">
                    <a href="{{ route('logout') }}" class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Main Content -->
        <div class="dashboard-content">
            <!-- Topbar -->
            <div class="topbar">
                <div class="d-flex align-items-center">
                    <button class="toggle-sidebar" id="toggleSidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="search-bar">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
                
                <div class="topbar-right">
                    <a href="#" class="notification-btn">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">5</span>
                    </a>
                    <a href="#" class="message-btn">
                        <i class="bi bi-chat"></i>
                        <span class="notification-badge">3</span>
                    </a>
                    <div class="dropdown user-dropdown">
                        <button class="btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                            <span>{{$user->name_en}}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Loading Indicator -->
                <div class="loading-indicator" id="loadingIndicator">
                    <div class="loading-spinner"></div>
                    <p>Loading content...</p>
                </div>
                
                <!-- Content Sections -->
                <div class="content-section active" id="dashboardSection">
                    <h2 class="section-title">Dashboard Overview</h2>
                    
                    <!-- Stats Cards -->
                    <div class="row mb-5">
                        <div class="col-md-3 mb-4">
                            <div class="stats-card">
                                <div class="card-title">Total CVs</div>
                                <div class="card-value">12</div>
                                <div class="d-flex align-items-center">
                                    <span class="text-success"><i class="bi bi-arrow-up me-1"></i> 20%</span>
                                    <span class="ms-2">last month</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-files"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card card-success">
                                <div class="card-title">Approved CVs</div>
                                <div class="card-value">8</div>
                                <div class="d-flex align-items-center">
                                    <span class="text-success"><i class="bi bi-arrow-up me-1"></i> 14%</span>
                                    <span class="ms-2">last month</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card card-warning">
                                <div class="card-title">Pending CVs</div>
                                <div class="card-value">2</div>
                                <div class="d-flex align-items-center">
                                    <span class="text-danger"><i class="bi bi-arrow-down me-1"></i> 2%</span>
                                    <span class="ms-2">last month</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-clock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card card-accent">
                                <div class="card-title">Profile Views</div>
                                <div class="card-value">48</div>
                                <div class="d-flex align-items-center">
                                    <span class="text-success"><i class="bi bi-arrow-up me-1"></i> 32%</span>
                                    <span class="ms-2">last month</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-outline-success" href="{{ route('applicants.create')}}">ADD</a>
                    <!-- Current CV Status -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2 class="section-title">Current CV Status</h2>
                            </div>
                            
                            <div class="status-card approved">
                                <div class="status-header">
                                    <div>
                                        <div class="cv-title">Marketing Specialist - 2024 Version</div>
                                        <div class="cv-meta">Uploaded: 15 March 2024 | Last updated: 20 April 2024</div>
                                    </div>
                                    <span class="status-badge badge-approved">Approved</span>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-outline-primary me-2"><i class="bi bi-eye me-1"></i> View</button>
                                    <button class="btn btn-outline-secondary me-2"><i class="bi bi-download me-1"></i> Download</button>
                                    <button class="btn btn-outline-success"><i class="bi bi-share me-1"></i> Share</button>
                                </div>
                            </div>
                            
                            <!-- Recent Activity -->
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Activity</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">CV Approved</h6>
                                                <small>2 hours ago</small>
                                            </div>
                                            <p class="mb-1">Your "Marketing Specialist" CV has been approved.</p>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">New Job Match</h6>
                                                <small>1 day ago</small>
                                            </div>
                                            <p class="mb-1">You've been matched with a Senior Marketing role.</p>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">Profile Viewed</h6>
                                                <small>2 days ago</small>
                                            </div>
                                            <p class="mb-1">Your profile was viewed by a recruiter.</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Job Recommendations -->
                        <div class="col-lg-4">
                            <h2 class="section-title">Job Recommendations</h2>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">Marketing</span>
                                    <h5 class="card-title">Senior Marketing Manager</h5>
                                    <p class="card-text">TechGlobal Inc. • New York, NY</p>
                                    <p class="text-muted">Your skills match 92% of requirements</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-success fw-bold">$95,000 - $120,000</span>
                                        <button class="btn btn-sm btn-primary">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Remote</span>
                                    <h5 class="card-title">Digital Marketing Specialist</h5>
                                    <p class="card-text">Creative Solutions • Remote</p>
                                    <p class="text-muted">Your skills match 87% of requirements</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-success fw-bold">$80,000 - $95,000</span>
                                        <button class="btn btn-sm btn-primary">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- My CVs Section -->
                <div class="content-section" id="cvsSection">
                    <h2 class="section-title">My CVs</h2>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">CV History</h5>
                                    <button class="btn btn-sm btn-primary">
                                        <i class="bi bi-plus me-1"></i>Add New
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>CV Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Marketing Specialist</td>
                                                    <td>20 Apr 2024</td>
                                                    <td><span class="badge bg-success bg-opacity-10 text-success">Approved</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                                        <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-download"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Marketing Coordinator</td>
                                                    <td>12 Feb 2024</td>
                                                    <td><span class="badge bg-warning bg-opacity-10 text-warning">Pending</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                                        <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-download"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Marketing Assistant</td>
                                                    <td>15 Dec 2023</td>
                                                    <td><span class="badge bg-success bg-opacity-10 text-success">Approved</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                                        <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-download"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Upload New CV</h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center p-5 border border-2 border-dashed rounded-3">
                                        <i class="bi bi-cloud-arrow-up text-primary mb-3" style="font-size: 3rem;"></i>
                                        <h5>Drag & drop your CV file here</h5>
                                        <p class="text-muted mb-4">Supported formats: PDF, DOC, DOCX (Max file size: 5MB)</p>
                                        <button class="btn btn-primary">
                                            <i class="bi bi-upload me-2"></i>Browse Files
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">CV Tips</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            Keep your CV to 1-2 pages maximum
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            Use action verbs to describe your experience
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            Tailor your CV for each job application
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            Include measurable achievements
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            Proofread carefully for errors
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">CV Status Guide</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-success bg-opacity-10 text-success me-3">Approved</span>
                                        <div>Your CV is visible to employers</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-warning bg-opacity-10 text-warning me-3">Pending</span>
                                        <div>Your CV is under review</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-danger bg-opacity-10 text-danger me-3">Rejected</span>
                                        <div>Needs modification before approval</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary me-3">Archived</span>
                                        <div>Not visible to employers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Notifications Section -->
                <div class="content-section" id="notificationsSection">
                    <h2 class="section-title">Notifications</h2>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Recent Notifications</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary me-1">Mark all as read</button>
                                        <button class="btn btn-sm btn-outline-danger">Clear All</button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">CV Approved</h6>
                                                        <small class="text-muted">2 hours ago</small>
                                                    </div>
                                                    <p class="mb-0">Your "Marketing Specialist" CV has been approved and is now visible to employers.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="bi bi-briefcase-fill text-primary" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">New Job Match</h6>
                                                        <small class="text-muted">1 day ago</small>
                                                    </div>
                                                    <p class="mb-0">You've been matched with a Senior Marketing role at TechGlobal Inc.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="bi bi-eye-fill text-info" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Profile Viewed</h6>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                    <p class="mb-0">Your profile was viewed by a recruiter at BrandVision Marketing.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="bi bi-file-earmark-plus-fill text-warning" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">CV Submitted</h6>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <p class="mb-0">You submitted a new version of your Marketing Coordinator CV.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Notification Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                        <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                        <label class="form-check-label" for="pushNotifications">Push Notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="cvStatusAlerts" checked>
                                        <label class="form-check-label" for="cvStatusAlerts">CV Status Alerts</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="jobMatchAlerts" checked>
                                        <label class="form-check-label" for="jobMatchAlerts">Job Match Alerts</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                        <label class="form-check-label" for="newsletter">Newsletter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Section -->
                <div class="content-section" id="profileSection">
                    <h2 class="section-title">My Profile</h2>
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                    <h4>Sophia Davis</h4>
                                    <p class="text-muted mb-4">Marketing Specialist</p>
                                    <div class="d-grid">
                                        <button class="btn btn-outline-primary mb-2">
                                            <i class="bi bi-pencil me-1"></i>Edit Profile
                                        </button>
                                        <button class="btn btn-outline-secondary">
                                            <i class="bi bi-camera me-1"></i>Change Photo
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Profile Completion</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Profile Strength</span>
                                        <span>92%</span>
                                    </div>
                                    <div class="progress mb-4" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                                    </div>
                                    
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>Personal Information</div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>Work Experience</div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>Education</div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </div>
                                        <div>Skills</div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bi bi-exclamation-circle-fill text-warning"></i>
                                        </div>
                                        <div>References</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="Sophia">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" value="Davis">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="sophia.davis@example.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" value="(555) 123-4567">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" value="New York, NY">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Professional Title</label>
                                        <input type="text" class="form-control" value="Marketing Specialist">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" rows="3">Experienced marketing specialist with 5+ years in digital marketing, content strategy, and brand development. Passionate about creating engaging campaigns that drive growth and customer engagement.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Section -->
                <div class="content-section" id="settingsSection">
                    <h2 class="section-title">Account Settings</h2>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Security Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Change Password</label>
                                        <input type="password" class="form-control mb-3" placeholder="Current Password">
                                        <input type="password" class="form-control mb-3" placeholder="New Password">
                                        <input type="password" class="form-control" placeholder="Confirm New Password">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Two-Factor Authentication</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                                            <label class="form-check-label" for="twoFactorAuth">Enable two-factor authentication</label>
                                        </div>
                                        <small class="text-muted">Add an extra layer of security to your account</small>
                                    </div>
                                    <button class="btn btn-primary">Update Security</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Privacy Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Profile Visibility</label>
                                        <select class="form-select mb-3">
                                            <option selected>Public (Visible to all employers)</option>
                                            <option>Private (Visible only to me)</option>
                                        </select>
                                        <small class="text-muted">Control who can see your profile</small>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Data Sharing</label>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="shareProfile" checked>
                                            <label class="form-check-label" for="shareProfile">Allow employers to view my full profile</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="shareCV" checked>
                                            <label class="form-check-label" for="shareCV">Allow employers to download my CV</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jobAlerts" checked>
                                            <label class="form-check-label" for="jobAlerts">Receive job recommendations based on my profile</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Update Privacy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.dashboard-sidebar');
            const content = document.querySelector('.dashboard-content');
            
            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('expanded');
                content.classList.toggle('expanded');
            });
            
            // Navigation functionality
            const navLinks = document.querySelectorAll('.nav-link');
            const contentSections = document.querySelectorAll('.content-section');
            const loadingIndicator = document.getElementById('loadingIndicator');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Get target section
                    const targetSection = this.getAttribute('data-section');
                    
                    // Show loading indicator
                    loadingIndicator.style.display = 'block';
                    
                    // Hide all sections
                    contentSections.forEach(section => {
                        section.classList.remove('active');
                    });
                    
                    // Simulate AJAX delay
                    setTimeout(() => {
                        // Hide loading indicator
                        loadingIndicator.style.display = 'none';
                        
                        // Show target section
                        document.getElementById(targetSection + 'Section').classList.add('active');
                    }, 800);
                });
            });
            
            // Responsive sidebar on mobile
            function handleResize() {
                if (window.innerWidth < 992) {
                    sidebar.classList.remove('expanded');
                    content.classList.remove('expanded');
                } else {
                    sidebar.classList.add('expanded');
                    content.classList.add('expanded');
                }
            }
            
            // Initial resize handler
            handleResize();
            
            // Add resize listener
            window.addEventListener('resize', handleResize);
        });
    </script>
</body>
</html>