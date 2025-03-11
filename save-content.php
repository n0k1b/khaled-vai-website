<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /admin/login.php');
    exit;
}

$jsonPath = __DIR__ . '/public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $section = $input['section'] ?? '';
    $content = $input['content'] ?? '';

    if ($section && isset($pageContent[$section])) {
        $pageContent[$section]['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $section = $_POST['section'] ?? '';
    $targetDir = __DIR__ . '/public/uploads/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $pageContent[$section]['image'] = 'uploads/' . basename($_FILES['image']['name']);
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Image updated successfully!';
    } else {
        echo 'Error uploading image.';
    }
}
