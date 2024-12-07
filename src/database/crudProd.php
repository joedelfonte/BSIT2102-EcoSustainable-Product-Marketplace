<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');

class Products extends Database {

    private $table = 'product';
    public $queryResult;

    function __construct(){
        parent::__construct();
    }

    //create
    public function addProduct($productName, $storeId, $price, $quantity, $description, $category, $productCode) {
        if ($productName != '' && $price != '' && $quantity != '') {
            // SQL query
            $query = "INSERT INTO $this->table (productCode, ProductName, quantity, price, description, store_id, category_id, status_id) 
                      VALUES (:ECOID, :name, :quantity, :price, :description, :userId, :category, 1)";
            $stmt = $this->conn->prepare($query);
    
            // Bind parameters
            $stmt->bindParam(':ECOID', $productCode);
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':userId', $storeId);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':category', $category);
    
            // Execute the statement and check for success
            if ($stmt->execute()) {
                return true;
            } else { 
                error_log('Error Executing Query: ' .$stmt->errorInfo());
                return false;
            }
        } else {
            return false;
        }
    }

    //read
    public function view(){
        $sqlProduct = "SELECT * FROM product";
        $stmtProduct = $this->conn->prepare($sqlProduct);
        if ($stmtProduct->execute()){
            return $stmtProduct->fetchAll(PDO::FETCH_ASSOC);
        } else {return 'Query Error Excecuting';}
    }
    
    public function search($value, $column){
        $value = isset($value) ? htmlspecialchars($value) : '';
        $query = "SELECT id, ProductName, description, productCode, price, imageDir FROM product WHERE LOWER($column)" ." LIKE " ."LOWER(:search);";

        $value = "%" .$value ."%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);

        if ($stmt->execute()){
            $this->queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->queryResult;
            // return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
        } else { return false;}

    }

    public function readAll($value, $stst){
        $query = "SELECT * FROM product 
                LEFT JOIN store on store.store_id = product.store_id 
                WHERE product.productCode = :search" ." and product.status_id = :status;";
        //$query = "SELECT * FROM product WHERE productCode = :search " ."and status_id = :status;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);
        $stmt->bindParam(':status', $stst);

        if ($stmt->execute()){
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($res);
            return $res;
        } else { return false;}

    }

    public function delete($id){
        $mysql = "DELETE FROM product WHERE id = :ID;";
        $stmt = $this->conn->prepare($mysql);
        $stmt->bindParam(':ID', $id);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    function __deconstruct(){
        $this->$queryResult = null;
    }
}
?>