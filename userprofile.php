<?php
require_once 'dbcon.php'; // Include the database connection file

// Create an instance of the Database class and establish a connection
$db = new Database();
$conn = $db->connect();

// Fetch user data from the `users` table
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id"); // Change :id to match the user you want
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
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-picture">
            <img src="avatar.jpg" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <div class="profile-header">
                <h1>User Profile</h1>
            </div>
            <div class="profile-info">
                <label for="username">Username:</label>
                <span id="username"><?php echo htmlspecialchars($user['username']); ?></span>
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
                <label for="address">Address:</label>
                <span id="address"><?php echo htmlspecialchars($user['address']); ?></span>
            </div>
            <div>
                <button>Products</button>
            </div>
        </div>
    </div>
</body>
</html>
