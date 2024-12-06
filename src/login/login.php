<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');

    session_start();
  
    //check if login form is submitted
    if(isset($_POST['login'])){
        //assign variables to post values
        $email = $_POST['email'];
        $password = $_POST['password'];
  
        //include our database connection
        include 'conn.php';
  
        //get the user with email
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
  
        try{
            $stmt->execute(['email' => $email]);
  
            //check if email exist
            if($stmt->rowCount() > 0){
                //get the row
                $user = $stmt->fetch();
  
                //validate inputted password with $user password
                if(password_verify($password, $user['password'])){
                    //action after a successful login
                    $_SESSION['success'] = 'Login Successful';
                    $_SESSION['status'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    //Joedel add
                    require_once realpath(dirname(__FILE__) . '/../../config.php');
                    echo '<meta http-equiv="refresh" content="0;url=\project\BSIT2102-EcoSustainable-Product-Marketplace\index.php">'; 
                    exit; // Stop further script execution
                }
                else{
                    //return the values to the user
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['error'] = 'Incorrect password';
                    $_SESSION['status'] = false;
                }
  
            }
            else{
                //return the values to the user
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
  
                $_SESSION['error'] = 'No account associated with the email';
            }
  
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
  
    }
    else{
        $_SESSION['error'] = 'Fill up login form first';
    }
  
    header('location: index.php');
?>