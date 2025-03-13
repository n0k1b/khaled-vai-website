<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /admin/login.php');
    exit;
}

require_once '../connection.php';

$orders = [];
try {
    $stmt = $pdo->query("SELECT id, order_number, customer_name, total_price, order_status, created_at FROM orders ORDER BY created_at DESC");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('Error fetching orders: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .orders-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .orders-table {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        /* Status colors */
        .status-select[data-status="pending"] {
            background-color: #fff3cd;
            border-color: #ffecb5;
            color: #664d03;
        }
        .status-select[data-status="processing"] {
            background-color: #cfe2ff;
            border-color: #b6d4fe;
            color: #084298;
        }
        .status-select[data-status="delivered"] {
            background-color: #d1e7dd;
            border-color: #badbcc;
            color: #0f5132;
        }
    </style>
</head>
<body>
    <div class="orders-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-shopping-cart me-2"></i>Manage Orders</h1>
            <a href="dashboard.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>
        <div class="orders-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Total Price (BDT)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($order['order_number']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['total_price']); ?> BDT</td>
                            <td>
                                <select class="form-select status-select"
                                        data-status="<?php echo $order['order_status']; ?>"
                                        onchange="updateStatus(<?php echo $order['id']; ?>, this.value)">
                                    <option value="pending" <?php echo $order['order_status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="processing" <?php echo $order['order_status'] === 'processing' ? 'selected' : ''; ?>>Processing</option>
                                    <option value="delivered" <?php echo $order['order_status'] === 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                            </td>
                            <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateStatus(orderId, status) {
            // Store the original select element and its previous value
            const selectElement = event.target;
            const previousStatus = selectElement.getAttribute('data-status');

            // Ask for confirmation before updating
            if (!confirm(`Are you sure you want to change the order status to ${status.toUpperCase()}?`)) {
                // If user cancels, revert the select to its previous value
                selectElement.value = previousStatus;
                return;
            }

            fetch('../admin/update-order-status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: orderId, status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the data-status attribute to reflect the new status
                    selectElement.setAttribute('data-status', status);
                    alert('Order status updated successfully');
                } else {
                    // Revert to previous status if update fails
                    selectElement.value = previousStatus;
                    alert('Failed to update order status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert to previous status if there's an error
                selectElement.value = previousStatus;
                alert('An error occurred while updating the status');
            });
        }
    </script>
</body>
</html>
