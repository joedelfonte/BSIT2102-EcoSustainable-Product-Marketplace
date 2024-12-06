<?php
session_start();
// echo $_SESSION['Id'];
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\userCrud.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    // $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $ecoId = $_SESSION['Id'];

    // echo $gender;
    $db = new Users();

    try {
        $updateStatus = $db->updateUserProfile($ecoId, $username, $name, $gender, $address);

        if ($updateStatus) {
            echo json_encode($updateStatus);

            ?>// echo $updateStatus;
            <?php
        } else {
            echo json_encode('error' + $updateStatus);
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method';
}
?>
