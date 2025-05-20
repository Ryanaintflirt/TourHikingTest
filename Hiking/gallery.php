<?php
include 'header.php';
include 'dbConnect.php';

// Handle form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $connect->real_escape_string($_POST['name']);
    $dob = $connect->real_escape_string($_POST['dob']);
    $selection = $connect->real_escape_string($_POST['selection']);
    $phone = $connect->real_escape_string($_POST['phone']);
    $email = $connect->real_escape_string($_POST['email']);

    $hid="SELECT id FROM hiking WHERE location='$selection'";
    $result=$connect->query($hid);
    $row=$result->fetch_assoc();
    $hid=$row['id'];

    // Create registrations table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS registrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        dob DATE NOT NULL,
        hiking_location INT NOT NULL,
        phone VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL,
        registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($connect->query($create_table)) {
        // Insert the registration data with current timestamp as default
        $sql = "INSERT INTO registrations (name, dob, hiking_location, phone, email, registration_date) 
                VALUES ('$name', '$dob', '$hid', '$phone', '$email', NOW())";

        if ($connect->query($sql)) {
            $success_message = "Registration successful! We'll contact you soon.";
        } else {
            $error_message = "Error: " . $connect->error;
        }
    } else {
        $error_message = "Error creating table: " . $connect->error;
    }
}

// Fetch all registrations with hiking location names
    $sql = "SELECT r.id, r.name, r.email, r.phone, r.dob, h.location as hiking_location, r.registration_date 
          FROM registrations r 
            LEFT JOIN hiking h ON r.hiking_location = h.id 
         ORDER BY r.registration_date DESC";
    $result = $connect->query($sql);
    $sql = "SELECT location FROM hiking";
    $result = $connect->query($sql);
?>



<div class="gallery-container">
    <div class="join-form-container">
        <?php if(isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($error_message)): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form class="join-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>Join Our Community</h2>
            
            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user"></i>
                    Full Name
                </label>
                <input type="text" id="name" name="name" required 
                       placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="dob">
                    <i class="fas fa-calendar"></i>
                    Date of Birth
                </label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="selection">
                    <i class="fas fa-list"></i>
                    Select Hiking
                </label>
                <select id="selection" name="selection" required>
                    <option value="">Choose a hiking</option>
                    <?php 
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['location']) . '">' . 
                                 htmlspecialchars($row['location']) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="phone">
                    <i class="fas fa-phone"></i>
                    Phone Number
                </label>
                <input type="tel" id="phone" name="phone" required 
                       placeholder="Enter your phone number">
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <input type="email" id="email" name="email" required 
                       placeholder="Enter your email address">
            </div>

            <button type="submit" class="join-btn">
                <i class="fas fa-user-plus"></i>
                Join Now
            </button>
        </form>
    </div>
</div>


<style>
.join-form-container {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.join-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.join-form h2 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 1rem;
    font-size: 1.8rem;
}

.join-form .form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.join-form label {
    color: #2c3e50;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.join-form label i {
    color: #3498db;
}

.join-form input,
.join-form select {
    padding: 0.8rem 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.join-form input:focus,
.join-form select:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    outline: none;
}

.join-form input::placeholder {
    color: #95a5a6;
}

.join-btn {
    background: #3498db;
    color: white;
    padding: 1rem;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    margin-top: 1rem;
}

.join-btn:hover {
    background: #2980b9;
    transform: translateY(-2px);
}

.join-btn:active {
    transform: translateY(0);
}

.join-btn i {
    font-size: 1.2rem;
}

@media (max-width: 768px) {
    .join-form-container {
        margin: 1rem;
        padding: 1.5rem;
    }

    .join-form h2 {
        font-size: 1.5rem;
    }
}

.alert {
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 8px;
    font-weight: 500;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>

<?php include 'footer.php'; ?>