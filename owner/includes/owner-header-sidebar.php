<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="includes/owner-style.css">
    <title>RentBox Dashboard</title>
</head>
<body>
    <div id="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <div class="col-12 header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <!-- Sidebar Toggle Button for small screens -->
                    <button id="toggleSidebarBtn" class="btn btn-outline-secondary me-3 d-md-none" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <!-- Logo -->
                    <img src="includes/logo-url.png" alt="RentBox Logo" class="logo" style="width: 50px; height: 50px; object-fit: contain;">
                    <h4 class="m-0">RentBox</h4>
                </div>
                <div class="d-flex align-items-center">
                    <!-- Messages Dropdown -->
                    <div class="dropdown me-3">
                        <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="fas fa-comment"></i> <span class="ms-2">Messages</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3" style="width: 300px;">
                            <li class="fw-bold mb-2">Recent Messages</li>
                            <li><a href="#" class="dropdown-item">John Doe: Hi there!</a></li>
                            <li><a href="#" class="dropdown-item">Jane Smith: Check this out...</a></li>
                            <li><a href="#" class="dropdown-item text-muted">View All Messages</a></li>
                        </ul>
                    </div>

                    <!-- Notifications Dropdown -->
                    <div class="dropdown me-3">
                        <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i> <span class="ms-2">Notifications</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3" style="width: 300px;">
                            <li class="fw-bold mb-2">Notifications</li>
                            <li><a href="#" class="dropdown-item">You have a new rental request</a></li>
                            <li><a href="#" class="dropdown-item">Gadget returned successfully</a></li>
                            <li><a href="#" class="dropdown-item text-muted">View All Notifications</a></li>
                        </ul>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                            <img src="includes/profile-pic-url.jpg" alt="User Profile" class="profile-img">
                            <div class="d-flex flex-column align-items-start profile-details">
                                <span class="fw-bold">Gustavo Xavier</span>
                                <span class="badge bg-warning text-dark">Owner</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="#" class="dropdown-item">Profile</a></li>
                            <li><a href="#" class="dropdown-item">Settings</a></li>
                            <li><a href="#" class="dropdown-item text-danger">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="sidebar">
                <input type="text" class="form-control my-3" placeholder="Search">
                <a href="#" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="#"><i class="fas fa-tablet-alt me-2"></i> Gadgets</a>
                <a href="#"><i class="fas fa-sync-alt me-2"></i> Rentals</a>
                <a href="#"><i class="fas fa-file-alt me-2"></i> All reports</a>
                <a href="#" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Log out</a>
            </div>

            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="includes/owner-js.js"></script>

