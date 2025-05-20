<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_username'])) {
    // Check for remember me cookie
    if (isset($_COOKIE['admin_username'])) {
        $_SESSION['admin_username'] = $_COOKIE['admin_username'];
    } else {
        // Redirect to login page if not logged in
        header('location: admin.php');
        exit();
    }
}

// Optional: Check session age (e.g., 30 minutes)
$session_lifetime = 1800; // 30 minutes in seconds
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > $session_lifetime)) {
    // Session expired
    session_unset();
    session_destroy();
    header('location: admin.php?error=session_expired');
    exit();
}

// Update last activity time
$_SESSION['login_time'] = time();
?> 