<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('HTTP/1.1 403 Forbidden');
    exit('Access denied');
}

$jsonPath = __DIR__ . '/../public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'] ?? '';
    $targetDir = __DIR__ . '/../wp-content/uploads/2025/01/';

    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Handle video upload
    if (isset($_FILES['video'])) {
        // Generate a unique filename
        $filename = uniqid() . '_' . basename($_FILES['video']['name']);
        $targetFile = $targetDir . $filename;
        $relativePath = 'wp-content/uploads/2025/01/' . $filename;

        // Check if the file was uploaded without errors
        if (is_uploaded_file($_FILES['video']['tmp_name'])) {
            if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFile)) {
                // Update video source in JSON
                if ($section === 'videoSource' && isset($pageContent['videoSection'])) {
                    $pageContent['videoSection']['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Video updated successfully!';
                } else {
                    echo 'Failed to update JSON content: Section not found or not supported.';
                }
            } else {
                echo 'Error moving uploaded video file.';
            }
        } else {
            echo 'Error uploading video.';
        }
        exit;
    }
}

echo 'Invalid request method or missing image file.';
