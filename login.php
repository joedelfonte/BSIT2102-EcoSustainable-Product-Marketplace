<?php

session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_post['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)) {
    header ("Location: index.php?error=Username is empty");
    exit();
}
else if(empty($pass)) {
    header ("Location: index.php?error=Password is empty");
    exit();
}
$sql = "SELECT * FROM users WHERE user_name'$uname' AND password='$pass'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['user_name'] == $uname && $row['password'] === $pass) {
            echo "Logged In";
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        }
        else{
            header("Location: index.php?error=Incorrect User Name or password");
            exit();
        }
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
