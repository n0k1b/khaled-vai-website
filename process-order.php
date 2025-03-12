<?php
require_once 'connection.php';

header('Content-Type: application/json');

try {
    // Validate required fields
    $requiredFields = ['name', 'phone', 'product_name', 'quantity', 'unit_price', 'total_price'];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        echo json_encode([
            'success' => false,
            'message' => 'Missing required fields: ' . implode(', ', $missingFields)
        ]);
        exit;
    }

    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'] ?? '', FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $productName = filter_var($_POST['product_name'], FILTER_SANITIZE_STRING);
    $quantity = (int)$_POST['quantity'];
    $unitPrice = (float)$_POST['unit_price'];
    $totalPrice = (float)$_POST['total_price'];
    $paymentMethod = filter_var($_POST['payment_method'] ?? 'cod', FILTER_SANITIZE_STRING);
    $orderStatus = filter_var($_POST['order_status'] ?? 'pending', FILTER_SANITIZE_STRING);

    // Validate phone number (basic validation for Bangladesh)
    if (!preg_match('/^01[3-9]\d{8}$/', $phone)) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid phone number format'
        ]);
        exit;
    }

    // Generate order number
    $orderNumber = 'ORD-' . date('Ymd') . '-' . rand(1000, 9999);

    // Insert order into database
    $stmt = $pdo->prepare("
        INSERT INTO orders (
            order_number,
            customer_name,
            customer_address,
            customer_phone,
            product_name,
            quantity,
            unit_price,
            total_price,
            payment_method,
            order_status,
            created_at
        ) VALUES (
            :order_number,
            :customer_name,
            :customer_address,
            :customer_phone,
            :product_name,
            :quantity,
            :unit_price,
            :total_price,
            :payment_method,
            :order_status,
            NOW()
        )
    ");

    $stmt->execute([
        ':order_number' => $orderNumber,
        ':customer_name' => $name,
        ':customer_address' => $address,
        ':customer_phone' => $phone,
        ':product_name' => $productName,
        ':quantity' => $quantity,
        ':unit_price' => $unitPrice,
        ':total_price' => $totalPrice,
        ':payment_method' => $paymentMethod,
        ':order_status' => $orderStatus
    ]);

    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Order placed successfully',
        'order_number' => $orderNumber
    ]);

} catch (PDOException $e) {
    // Log the error
    error_log('Order processing error: ' . $e->getMessage());

    // Return error response
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred'
    ]);
}
