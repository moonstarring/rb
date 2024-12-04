
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>RentBox Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: #f8f9fa;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 60px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            display: block;
            padding: 15px 20px;
            font-size: 14px;
            color: #495057;
            text-decoration: none;
            transition: background 0.3s, color 0.3s;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background: #e9ecef;
            color: #212529;
        }
        .sidebar input {
            margin: 10px 15px;
            border-radius: 20px;
            padding: 5px 15px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        .header {
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header img.logo {
            height: 40px;
        }
        .header .dropdown-menu {
            width: 280px;
        }
        .notification-drawer,
        .message-drawer {
            max-height: 300px;
            overflow-y: auto;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-secondary d-md-none me-3" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <img src="includes/logo.png" alt="RentBox Logo" class="logo">
            <h4 class="ms-2">RentBox</h4>
        </div>
        <div class="d-flex align-items-center">
            <!-- Messages Dropdown -->
            <div class="dropdown me-3">
                <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                    <i class="fas fa-comment fs-5"></i> <span class="ms-2">Messages</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow message-drawer">
                    <li class="fw-bold mb-2 px-3">Recent Messages</li>
                    <li class="d-flex align-items-center px-3 mb-2">
                        <img src="includes/user1.jpg" class="rounded-circle me-2" alt="User" width="40" height="40">
                        <div>
                            <p class="fw-bold mb-0">Juan dela Cruz</p>
                            <small class="text-muted">Hi, I'm interested in renting your gadget.</small>
                        </div>
                    </li>
                    <li class="text-center mt-3"><a href="#" class="text-decoration-none text-primary">View All Messages</a></li>
                </ul>
            </div>
            <!-- Notifications Dropdown -->
            <div class="dropdown me-3">
                <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                    <i class="fas fa-bell fs-5"></i> <span class="ms-2">Notifications</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow notification-drawer">
                    <li class="d-flex align-items-start px-3 mb-2">
                        <i class="fas fa-box me-3 fs-4"></i>
                        <div>
                            <p class="fw-bold mb-0">Transaction Updates</p>
                            <small class="text-muted">Your gadget has been rented!</small>
                        </div>
                    </li>
                    <li class="text-center mt-3"><a href="#" class="text-decoration-none text-primary">View All Notifications</a></li>
                </ul>
            </div>
            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                    <img src="includes/profile.jpg" alt="Profile Picture" class="profile-img me-2">
                    <span>Gustavo Xavier</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="#" class="dropdown-item">Profile</a></li>
                    <li><a href="#" class="dropdown-item">Settings</a></li>
                    <li><a href="/rb/owner/logout.php" class="dropdown-item text-danger">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <input type="text" class="form-control" placeholder="Search">
        <a href="/rb/admin/dashboard.php" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="/rb/admin/account-management.php"><i class="fas fa-user me-2"></i> Account Management</a>
        <a href="/rb/admin/verification-confirmation.php"><i class="fas fa-check-circle me-2"></i> Verification Confirmation</a>
        <a href="/rb/admin/gadget-management.php"><i class="fas fa-tablet-alt me-2"></i> Gadget Management</a>
        <a href="/rb/admin/transactions.php"><i class="fas fa-exchange-alt me-2"></i> Transactions</a>
        <a href="/rb/admin/disputes.php"><i class="fas fa-gavel me-2"></i> Dispute Management</a>
        <a href="/rb/admin/reports.php"><i class="fas fa-chart-bar me-2"></i> Reports and Analytics</a>
        <a href="/rb/admin/notifications.php"><i class="fas fa-bell me-2"></i> Notifications</a>
        <a href="/rb/admin/settings.php"><i class="fas fa-cogs me-2"></i> Settings</a>
        <a href="/rb/admin/logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Log Out</a>
    </div>

</body>
</html>