<?php
include 'header.php';
include 'dbConnect.php';

// Fetch all hiking information
$sql = "SELECT * FROM hiking ORDER BY ID ASC";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hiking Information</title>
    <style>
        .hiking-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .hiking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .hiking-header h2 {
            color: #2c3e50;
            font-size: 2rem;
        }

        .add-btn {
            background: #3498db;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .hiking-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .hiking-table th,
        .hiking-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .hiking-table th {
            background: #34495e;
            color: white;
            font-weight: 500;
        }

        .hiking-table tr:hover {
            background: #f8f9fa;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background: #3498db;
        }

        .edit-btn:hover {
            background: #2980b9;
        }

        .delete-btn {
            background: #e74c3c;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        .no-data {
            text-align: center;
            padding: 2rem;
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        .date-column {
            white-space: nowrap;
        }

        .fee-column {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="hiking-container">
        <div class="hiking-header">
            <h2>Hiking Information</h2>
            <a href="add_hiking.php" class="add-btn">
                <i class="fas fa-plus"></i> Add New Hiking
            </a>
        </div>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="hiking-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Fee (RM)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['ID']); ?></td>
                            <td><?php echo htmlspecialchars($row['Location']); ?></td>
                            <td><?php echo htmlspecialchars($row['Description']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars($row['Date']); ?></td>
                            <td class="fee-column"><?php echo number_format($row['Fee'], 2); ?></td>
                            <td>
                                <a href="edit_hiking.php?id=<?php echo $row['ID']; ?>" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_hiking.php?id=<?php echo $row['ID']; ?>" class="action-btn delete-btn" 
                                   onclick="return confirm('Are you sure you want to delete this hiking information?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">
                <p>No hiking information available. Click "Add New Hiking" to add some!</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
