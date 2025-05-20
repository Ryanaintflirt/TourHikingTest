<?php
include 'dbConnect.php';

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute the delete query
    $sql = "DELETE FROM hiking WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redirect back to view page with success message
        header("Location: view_hiking.php?message=deleted");
        exit();
    } else {
        // Redirect back with error message
        header("Location: view_hiking.php?error=delete_failed");
        exit();
    }
} else {
    // If no ID provided, redirect back
    header("Location: view_hiking.php");
    exit();
}

$stmt->close();
$conn->close();
?> 