<?php
require_once 'dbcon.php'; // Include the database connection file

// Create an instance of the Database class and establish a connection
$db = new Database();
$conn = $db->connect();

try {
    // Fetch user and address data using a join
    $stmt = $conn->prepare("
        SELECT 
            users.Name, 
            users.nickname, 
            users.gender, 
            users.email, 
            address.Address 
        FROM users
        LEFT JOIN address ON users.id = address.owner_id
        WHERE users.id = :id
    ");
    $stmt->execute(['id' => 1]); // Replace '1' with the actual user ID
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} catch (PDOException $e) {
    echo "Error fetching user: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Font Awesome for the update icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-picture">
            <img src="avatar.jpg" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <div class="profile-header">
                <h1>User Profile</h1>
                <!-- Update profile icon/button -->
                <a href="update_profile.php" class="update-profile">
                    <i class="fas fa-user-edit"></i> Update Profile
                </a>
            </div>
            <div class="profile-info">
                <label for="Name">Name:</label>
                <span id="Name"><?php echo htmlspecialchars($user['Name']); ?></span>
            </div>
            <div class="profile-info">
                <label for="nickname">Nickname:</label>
                <span id="nickname"><?php echo htmlspecialchars($user['nickname']); ?></span>
            </div>
            <div class="profile-info">
                <label for="gender">Gender:</label>
                <span id="gender"><?php echo htmlspecialchars($user['gender']); ?></span>
            </div>
            <div class="profile-info">
                <label for="email">Email:</label>
                <span id="email"><?php echo htmlspecialchars($user['email']); ?></span>
            </div>
            <div class="profile-info">
                <label for="Address">Address:</label>
                <span id="Address"><?php echo htmlspecialchars($user['Address']); ?></span>
            </div>
            <div>
                <button>Products</button>
            </div>
        </div>
    </div>
</body>
</html>
