<?php

$uname = "localhost";
$name = "root";
$password = "";

$db_name = "test_db";
$conn = mysqli_connect($name, $uname, $password, $db_name);
if(!$conn) {
    echo "connection failed";
}
