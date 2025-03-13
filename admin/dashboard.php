<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /admin/login.php');
    exit;
}

// Fetch recent orders from the database
require_once '../connection.php';

$recentOrders = [];
try {
    $stmt = $pdo->query("SELECT order_number, customer_name, customer_address, customer_phone, total_price, order_status, created_at FROM orders ORDER BY created_at DESC LIMIT 5");
    $recentOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('Error fetching recent orders: ' . $e->getMessage());
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
                    <a href="../admin/orders.php" class="btn btn-primary"><i class="fas fa-eye me-2"></i>Show Orders</a>
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
                        <i class="fas fa-key"></i>
                    </div>
                    <h3>Change Password</h3>
                    <p>Update your admin account password</p>
                    <a href="../admin/change-password.php" class="btn btn-secondary"><i class="fas fa-lock me-2"></i>Change Password</a>
                </div>
            </div>

            <!--
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
            -->
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <h3><i class="fas fa-receipt me-2"></i>Recent Orders</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentOrders as $order): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['order_number']); ?></td>
                                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                    <td><?php echo htmlspecialchars($order['customer_address']); ?></td>
                                    <td><?php echo htmlspecialchars($order['customer_phone']); ?></td>
                                    <td><?php echo htmlspecialchars($order['total_price']); ?> BDT</td>
                                    <td><?php echo htmlspecialchars($order['order_status']); ?></td>
                                    <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
