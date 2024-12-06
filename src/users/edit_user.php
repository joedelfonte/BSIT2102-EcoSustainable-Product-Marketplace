<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH . '\src\database\database.php');
require ROOT_PATH .'/assets/pageTemplate/header.php';
// Instantiate the Database class and connect
$db = new Database();
$pdo = $db->getDatabase();

if ($pdo) {
    try {
        // Get the user ID from the URL
        if (isset($_GET['id'])) {
            $userId = intval($_GET['id']);

            // Fetch data for the specific user
            $sqlUser = "SELECT id, name, username, nickname, email, gender FROM users WHERE id = :id";
            $stmtUser = $pdo->prepare($sqlUser);
            $stmtUser->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmtUser->execute();
            $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "User not found.";
                exit;
            }
        } else {
            echo "No user ID provided.";
            exit;
        }

        // Update user data if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $username = $_POST['username'] ?? '';
            $nickname = $_POST['nickname'] ?? '';
            $email = $_POST['email'] ?? '';
            $gender = $_POST['gender'] ?? '';

            // Update query
            $sqlUpdate = "UPDATE users SET name = :name, username = :username, nickname = :nickname, email = :email, gender = :gender WHERE id = :id";
            $stmtUpdate = $pdo->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':name', $name, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':username', $username, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':id', $userId, PDO::PARAM_INT);

            if ($stmtUpdate->execute()) {
                echo "<div class='message'>Record updated successfully.</div>";
            } else {
                echo "<div class='message'>Failed to update record.</div>";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Database connection failed.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
            display: inline-block;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .escape-button {
            display: block;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            width: 100%;
            font-size: 16px;
            margin: 20px 0; /* Adjusted margin */
            cursor: pointer;
        }
        .exit-button {
             text-align: center;
          cursor: pointer;
          padding: 10px 15px;
          border-radius: 4px;
         text-decoration: none;
         background-color: #007bff;
         color: white;
         display: inline-block; 
         font-size: 16px;
         margin-top: 20px;
        }


/* Add this to center the button */
.center-container {
    text-align: center; /* Centers inline-block elements inside */
}

        .escape-button:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Edit User Information</h2>
    <div class="form-container">
        <?php if (isset($user)): ?>
            <form method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>

                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" value="<?php echo htmlspecialchars($user['nickname']); ?>"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                </select><br>

                <input type="submit" value="Update">
            </form>
            <a href="/project\BSIT2102-EcoSustainable-Product-Marketplace/src/admin/showinfo.php" class="exit-button">Back to User Info</a>
        <?php endif; ?>
    </div>
</body>
</html>
