<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH . '\src\database\userCrud.php');
session_start();

if (isset($_POST['register'])) {
    // Assign variables to post values
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : '';

    if ($password != $confirm) {
        // Return the values to the user
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['confirm'] = $confirm;

        // Display error
        $_SESSION['error'] = 'Passwords did not match';
    } else {
        // instance of the Users class
        $db = new Users();

        // Check if the email is already taken
        $existingUser = $db->search($email, 'email');

        if ($existingUser && count($existingUser) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['confirm'] = $confirm;
            $_SESSION['status'] = true;
            
            // Display error
            $_SESSION['error'] = 'Email already taken';
        } else {
            try {
                $db->addAccount($email, $password);
                $_SESSION['success'] = 'User verified. You can <a href="index.php">login</a> now';
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
    }
} else {
    $_SESSION['error'] = 'Fill up registration form first';
}

header('Location: register_form.php');
?>
