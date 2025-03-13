<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('HTTP/1.1 403 Forbidden');
    exit;
}

require_once '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['status'])) {
    try {
        $stmt = $pdo->prepare("UPDATE orders SET order_status = :status WHERE id = :id");
        $stmt->execute([':status' => $data['status'], ':id' => $data['id']]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        error_log('Error updating order status: ' . $e->getMessage());
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
