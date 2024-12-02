<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>Home</head>
        <body>
            <a href="logout.php">Logout</a>
        </body>
    </html>
    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>
