<?php
require_once 'dbcon.php'; // Include the database connection file

// Create an instance of the Database class and establish a connection
$db = new Database();
$conn = $db->connect();

// Replace '1' with the actual user ID (e.g., from session)
$userId = 1;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $nickname = $_POST['nickname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['Address'];

    // Debug output to check form values
    echo "Name: $name, Nickname: $nickname, Gender: $gender, Email: $email, Address: $address, UserID: $userId<br>";

    try {
        // Update users table
        $stmt = $conn->prepare("
            UPDATE users 
            SET Name = :name, 
                nickname = :nickname, 
                gender = :gender, 
                email = :email
            WHERE id = :id
        ");
        $stmt->execute([
            'name' => $name,
            'nickname' => $nickname,
            'gender' => $gender,
            'email' => $email,
            'id' => $userId
        ]);

        // Check if the address already exists
        $stmt = $conn->prepare("
            SELECT COUNT(*) FROM address WHERE owner_id = :id
        ");
        $stmt->execute(['id' => $userId]);
        $addressExists = $stmt->fetchColumn() > 0;

        if ($addressExists) {
            // Update existing address
            $stmt = $conn->prepare("
                UPDATE address 
                SET Address = :address 
                WHERE owner_id = :id
            ");
            $stmt->execute([
                'address' => $address,
                'id' => $userId
            ]);
        } else {
            // Insert new address
            $stmt = $conn->prepare("
                INSERT INTO address (owner_id, Address)
                VALUES (:id, :address)
            ");
            $stmt->execute([
                'address' => $address,
                'id' => $userId
            ]);
        }

        // Redirect to the update profile page with a success message
        header("Location: update_profile.php?update=success");
        exit;
    } catch (PDOException $e) {
        echo "Error updating profile: " . $e->getMessage();
        exit;
    }
}

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
    $stmt->execute(['id' => $userId]);
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
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-picture">
            <img src="avatar.jpg" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <div class="profile-header">
                <h1>Update Profile</h1>
            </div>
            <?php
            // Check if the update was successful
            if (isset($_GET['update']) && $_GET['update'] == 'success') {
                echo "<p style='color: green;'>Profile updated successfully!</p>";
            }
            ?>
            <form method="post" action="update_profile.php">
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
                <div class="profile-info">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" value="<?php echo htmlspecialchars($user['Name']); ?>">
                </div>
                <div class="profile-info">
                    <label for="nickname">Nickname:</label>
                    <input type="text" id="nickname" name="nickname" value="<?php echo htmlspecialchars($user['nickname']); ?>">
                </div>
                <div class="profile-info">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>">
                </div>
                <div class="profile-info">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>
                <div class="profile-info">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" value="<?php echo htmlspecialchars($user['Address'] ?? ''); ?>">
                </div>
                <div>
                    <!-- Save button -->
                    <button type="submit">Save</button>
                    <!-- Cancel button -->
                    <a href="userprofile.php" class="exit-button">
                        <button type="button">x</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
