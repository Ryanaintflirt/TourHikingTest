<?php
include 'header.php';
include 'dbConnect.php';

// Fetch all registrations with hiking location names
$sql = "SELECT r.*, h.location as hiking_location 
        FROM registrations r 
        LEFT JOIN hiking h ON r.hiking_location = h.id 
        ORDER BY r.registration_date DESC";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Registrations</title>
    <style>
        .users-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .users-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .users-header h2 {
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

        .users-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .users-table th,
        .users-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .users-table th {
            background: #34495e;
            color: white;
            font-weight: 500;
        }

        .users-table tr:hover {
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

        .email-column {
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="users-container">
        <div class="users-header">
            <h2>User Registrations</h2>
            <a href="add_user.php" class="add-btn">
                <i class="fas fa-user-plus"></i> Add New User
            </a>
        </div>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Hiking Location</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars($row['dob']); ?></td>
                            <td><?php echo htmlspecialchars($row['hiking_location']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td class="email-column"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars($row['registration_date']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" 
                                   onclick="return confirm('Are you sure you want to delete this registration?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">
                <p>No user registrations available. Click "Add New User" to add some!</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
