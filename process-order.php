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
    $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8');
    $productName = htmlspecialchars($_POST['product_name'] ?? '', ENT_QUOTES, 'UTF-8');
    $quantity = (int)$_POST['quantity'];
    $unitPrice = (float)$_POST['unit_price'];
    $totalPrice = (float)$_POST['total_price'];
    $paymentMethod = htmlspecialchars($_POST['payment_method'] ?? 'cod', ENT_QUOTES, 'UTF-8');
    $orderStatus = htmlspecialchars($_POST['order_status'] ?? 'pending', ENT_QUOTES, 'UTF-8');

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
    $referenceNo = $_SERVER['REFERENCE_NO']??'';

    // Insert order into database
    $stmt = $pdo->prepare("
        INSERT INTO orders (
            reference_no,
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
            :reference_no,
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
        ':reference_no' => $referenceNo,
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
