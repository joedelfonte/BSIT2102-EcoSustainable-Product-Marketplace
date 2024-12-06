<link rel="stylesheet" href="\project\BSIT2102-EcoSustainable-Product-Marketplace\assets\css\profile.css">
<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
require_once(ROOT_PATH .'\src\database\userCrud.php'); // Include the database connection file

try {

    // Create an instance of the Database class and establish a connection
$db = new Users();
$user = $db->readAll('ECO0002');
    if (empty($user)|| count($user) > 1){throw new Exception('Invalid Parametrs Gather in database');}
    foreach($user as $row){
?>
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">

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
                <span id="username"><?php echo htmlspecialchars($row['username']); ?></span>
            </div>
            <div class="profile-info">
                <label for="nickname">Nickname:</label>
                <span id="nickname"><?php echo htmlspecialchars($row['nickname']); ?></span>
            </div>
            <div class="profile-info">
                <label for="gender">Gender:</label>
                <span id="gender"><?php echo htmlspecialchars($row['gender']); ?></span>
            </div>
            <div class="profile-info">
                <label for="email">Email:</label>
                <span id="email"><?php echo htmlspecialchars($row['email']); ?></span>
            </div>
            <div class="profile-info">
                <label for="address">Address:</label>
                <span id="address"><?php echo htmlspecialchars($row['address']); ?></span>
            </div>
            <a href="editProfile.php"><button type="button">Edit Profile </button></a>

        </div>
    </div>
<?php
    }
} catch (Exception $err){
    echo 'Error';

}


// Fetch user data from the `users` table
?>
