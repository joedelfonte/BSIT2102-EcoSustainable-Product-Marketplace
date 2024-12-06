<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');

class Products extends Database {
    private $code;
    private $ProductName;
    private $price;
    private $description;
    private $stock;
    private $sellerId;
    private $categoryId;
    private $statusId;
    private $imangeDir;

    public $queryResult;

    function __construct(){
        parent::__construct();
    }

    //create
    public function addProduct(){
        //clean data
        $query = "INSERT INTO `product`(`ProductName`, `productCode`, `description`, `price`, `quantity`, `store_id`, `category_id`, `status_id`, `imageDir`) 
                    VALUES (:name, )";
    }

    //read
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

    function __deconstruct(){
        $this->conn = null;
        $this->code = null;
        $this->ProductName = null;
        $this->price = null;
        $this->description = null;
        $this->stock = null;
        $this->sellerId = null;
        $this->categoryId = null;
        $this->statusId = null;
        $this->imangeDir = null;
        $this->$queryResult = null;
    }
}
?>