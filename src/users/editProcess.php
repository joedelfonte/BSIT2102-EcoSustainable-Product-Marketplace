<?php
session_start();
echo $_SESSION['EcoId'];
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\userCrud.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $nickname = isset($_POST['nickname']) ? htmlspecialchars($_POST['nickname']) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $ecoId = 'ECO0002'; // Assuming the EcoId is known or retrieved from session or other source

    // Create an instance of the Users class and establish a connection
    $db = new Users();

    try {
        // Update the user profile in the database
        $updateStatus = $db->updateUserProfile($ecoId, $username, $nickname, $gender, $email, $address);

        if ($updateStatus) {
            echo 'Profile updated successfully';
        } else {
            echo 'Failed to update profile';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method';
}
?>
