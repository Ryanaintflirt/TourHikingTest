<?php
include 'header.php';
include 'dbConnect.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: view_hiking.php");
    exit();
}

$id = $_GET['id'];

// Fetch the hiking information
$sql = "SELECT * FROM hiking WHERE ID = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: view_hiking.php?error=not_found");
    exit();
}

$hiking = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = isset($_POST['Location']) ? $_POST['Location'] : '';
    $description = isset($_POST['Description']) ? $_POST['Description'] : '';
    $date = isset($_POST['Date']) ? $_POST['Date'] : '';
    $fee = isset($_POST['Fee']) ? $_POST['Fee'] : '';

    // Update the record
    $update_sql = "UPDATE hiking SET Location = ?, Description = ?, Date = ?, Fee = ? WHERE ID = ?";
    $update_stmt = $connect->prepare($update_sql);
    $update_stmt->bind_param("sssdi", $location, $description, $date, $fee, $id);

    if ($update_stmt->execute()) {
        header("Location: view_hiking.php?message=updated");
        exit();
    } else {
        $error = "Failed to update hiking information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hiking Information</title>
    <style>
        .edit-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .edit-header {
            margin-bottom: 2rem;
        }

        .edit-header h2 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #34495e;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 1rem;
            padding: 0.5rem;
            background: #fde8e8;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-header">
            <h2>Edit Hiking Information</h2>
        </div>

        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="Location">Location:</label>
                <input type="text" id="Location" name="Location" class="form-control" 
                       value="<?php echo htmlspecialchars($hiking['Location']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea id="Description" name="Description" class="form-control" rows="4" required><?php echo htmlspecialchars($hiking['Description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="Date">Date:</label>
                <input type="Date" id="Date" name="Date" class="form-control" 
                       value="<?php echo htmlspecialchars($hiking['Date']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Fee">Fee (RM):</label>
                <input type="number" id="Fee" name="Fee" class="form-control" step="0.01" 
                       value="<?php echo htmlspecialchars($hiking['Fee']); ?>" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Update Information</button>
                <a href="view_hiking.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$connect->close();
include 'footer.php';
?> 