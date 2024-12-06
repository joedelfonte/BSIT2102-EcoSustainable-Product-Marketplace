<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once (ROOT_PATH . '\src\database\userCrud.php');

if (!isset($_SESSION['email'])){
    // echo '<meta http-equiv="refresh" content="0;url=\project\BSIT2102-EcoSustainable-Product-Marketplace\src\login\login.php">'; 
             // Stop further script execution
}

if ($_SESSION['status'] = true){
    echo '1';
    $user1 = new Users();

    $email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '';

    if (empty($email)) {
    }

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $user1->getconn()->prepare($query);
    $stmt->bindParam(':email', $email);

    try {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        if ($result) {
            foreach ($result as $row){
                $_SESSION['Id'] = $result['id'];
                $_SESSION['user'] = $result['Name'];
                echo $_SESSION['user'];
            }
        } else {
            echo 'User not found.';
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo 'Database error: ' . $e->getMessage();
    }
}