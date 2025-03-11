<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // Redirect to the dashboard if logged in
    header('Location: ../admin/dashboard.php');
} else {
    // Redirect to the login page if not logged in
    header('Location: /admin/login.php');
}
exit;
