<?php 

class DatabaseSummary extends Database {

    function __construct(){
        parent::__construct();
    }

    function executeQuery($sqlQuery){
        $result = $this->conn->query($sqlQuery);
        $row = $result->fetchall();

        if (count($row) > 0) {
            //var_dump($row);
            return $row;
        } else {
            echo 'No results';
            $row = null;
        }
    }

    function dateCountQuery(){
        return $sqlQuery = "SELECT DATE_FORMAT(DateCreated, '%Y-%m') AS Month, COUNT(*) AS NumberOfUsers
                FROM users
                GROUP BY DATE_FORMAT(DateCreated, '%Y-%m')
                ORDER BY DATE_FORMAT(DateCreated, '%Y-%m');";
        
    }

    function userRoleStatusSummary(){
        return $sqlQuery = "SELECT * FROM `users` 
            left join roles on roles.role_id = users.role_id 
            LEFT join status on users.status_id = status.status_id;";
    }
//last state fix naming of ids
    function userSummary(){
        return $sqlQuery = "SELECT DATE_FORMAT(DateCreated, '%Y-%m') AS Month, COUNT(*) AS NumberOfUsers
        FROM users
        GROUP BY DATE_FORMAT(DateCreated, '%Y-%m')
        ORDER BY DATE_FORMAT(DateCreated, '%Y-%m');";

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