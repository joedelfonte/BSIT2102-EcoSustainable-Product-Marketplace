<?php

require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');

class Products extends Database {

    function __construct(){
        parent::__construct();
    }

    //read
    public function searchOnlyProducts($value, $comparison ,$column){
        $query = "SELECT * FROM product WHERE LOWER($column)" ."LIKE " ."LOWER(:search);";
        $value = "%" .$value ."%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);

        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);;
        } else { return false;}

    }

    public function selectProducts($value, $stst){
        $query = "SELECT * FROM product 
                LEFT JOIN store on store.id = product.store_id 
                WHERE product.productCode = :search" ." and product.status_id = :status;";
        //$query = "SELECT * FROM product WHERE productCode = :search " ."and status_id = :status;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);
        $stmt->bindParam(':status', $stst);

        if ($stmt->execute()){
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);
            return $res;
        } else { return false;}

    }
}


?>