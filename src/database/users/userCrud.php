<?php
require_once realpath(dirname(__FILE__) . '../../../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');

class Users extends Database {

    function __construct(){
        parent::__construct();
    }

    //add ka na lang ng crud 
    //ito ang read
    function read(){
        $sqlQuery = "Select * from users;";
        $result = $this->conn->query($sqlQuery);
        $row = $result->fetchall();

        if (count($row) > 0) {
            // var_dump($row);
            return $row;
        } else {
            echo 'No results';
            $row = null;
        }
    }
}


?>