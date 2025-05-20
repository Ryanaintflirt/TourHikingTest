<?php
include 'header.php';

if(isset($_GET['username'])) {
    $username = $_GET['username'];
} else {
    $username = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        
        .action-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        
        .action-button:hover {
            background-color: #2980b9;
        }
        .logout-container {
            text-align: center;
            margin: 20px;
        }
        .logout-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>
    
    <div class="button-container">
        <a href="view_hiking.php" class="action-button">View Hiking Information</a>
        <a href="add_hiking.php" class="action-button">Insert Information</a>
        <a href="view_users.php" class="action-button">View User Registration</a>
        <a href="add_admin.php" class="action-button">Add New Admin</a>
    </div>

    <div class="logout-container">
        <a href="admin.php" class="logout-button">Logout</a>
    </div>
</body>
</html>

<?php
include 'footer.php';
?>