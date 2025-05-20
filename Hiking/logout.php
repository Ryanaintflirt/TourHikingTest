<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Clear the remember me cookie if it exists
if (isset($_COOKIE['admin_username'])) {
    setcookie('admin_username', '', time() - 3600, '/');
}

// Redirect to login page
header('location: admin.php');
exit();
?> 