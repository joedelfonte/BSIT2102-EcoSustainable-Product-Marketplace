<?php
session_start();
session_destroy();
session_start();
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH . '/src/database/userCrud.php');

if (isset($_POST['login'])) {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Create an instance of the Users class
    $db = new Users();

    try {
        $user = $db->readLog($email);

        // Check if email exists
        if ($user && count($user) > 0) {
            // Get the user data (assuming only one user is returned)
            $user = $user[0];
            // var_dump($user);

            // Validate inputted password with user password
            if (password_verify($password, $user['password'])) {
                // Action after a successful login
                $_SESSION['Id'] = $user['id'];
                $_SESSION['success'] = 'Login Successful';
                $_SESSION['user'] = isset($user['Name']) ? $user['Name'] : '' ;
                $_SESSION['status'] = true;
                $_SESSION['email'] = $email;

                error_log($_SESSION['grant']);

                if ($user['role_id'] === 1){
                    $_SESSION['grant'] = 1;
                } else {
                    $_SESSION['grant'] = 2;
                }
                

                // if ($user['role_id'] = 1){//admin
                //     // echo '<meta http-equiv="refresh" content="0;url=\project\BSIT2102-EcoSustainable-Product-Marketplace\src\admin\showinfo.php">';
                //     // exit;
                // } else {
                echo '<meta http-equiv="refresh" content="0;url=/project/BSIT2102-EcoSustainable-Product-Marketplace/index.php">';
                exit;
                // }

            } else {
                echo '1';
                $_SESSION['email'] = $email;
                $_SESSION['error'] = 'Incorrect password';
                $_SESSION['status'] = false;
            }
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['error'] = 'No account associated with the email';
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
} else {
    $_SESSION['error'] = 'Fill up login form first';
}

header('Location: index.php');
?>
