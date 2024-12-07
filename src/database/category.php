<?php
require_once('database.php');

class CategoryCrud extends Database{
    function __construct(){
        parent::__construct();
    }

    //view all Category
    public function showCategory(){

        $query = "SELECT * FROM category;";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}


?>