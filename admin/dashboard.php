<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /admin/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #007bff;
        }
        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard</h1>
            <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="card-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Manage Orders</h3>
                    <p>View and manage all customer orders</p>
                    <a href="/admin/orders.php" class="btn btn-primary"><i class="fas fa-eye me-2"></i>Show Orders</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="card-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3>Update Content</h3>
                    <p>Edit website content and information</p>
                    <a href="../index.php" target="_blank" class="btn btn-success"><i class="fas fa-pencil-alt me-2"></i>Edit Content</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="card-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h3>Settings</h3>
                    <p>Configure website settings and options</p>
                    <a href="/admin/settings.php" class="btn btn-secondary"><i class="fas fa-wrench me-2"></i>Manage Settings</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="dashboard-card">
                    <h3><i class="fas fa-chart-line me-2"></i>Recent Activity</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            New order received
                            <span class="badge bg-primary rounded-pill">Just now</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Content updated
                            <span class="badge bg-secondary rounded-pill">2 hours ago</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            New user registered
                            <span class="badge bg-info rounded-pill">Yesterday</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card">
                    <h3><i class="fas fa-bullhorn me-2"></i>Announcements</h3>
                    <div class="alert alert-info">
                        <strong>New Feature:</strong> You can now export orders to CSV format.
                    </div>
                    <div class="alert alert-warning">
                        <strong>Reminder:</strong> Update your password regularly for security.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>Admin Dashboard &copy; <?php echo date('Y'); ?> | All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
