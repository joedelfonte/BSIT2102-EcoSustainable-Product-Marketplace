<?php
include_once('database.php');

class CrudProducts{
    private $productName;
    private $price;
    private $quantity;
    private $description;
    private $storeId;
    private $productCode;
    private $productImage;
    private $table = 'products';
    private $conn;

    function __construct($db){
        $this->conn = $db;  
        //echo $this->conn;
    }

   public function addProduct(){
        try {
            $productName = isset($_POST['productName']) ? htmlspecialchars(trim($_POST['productName'])) : '';
            $productCode = isset($_POST['productCode']) ? htmlspecialchars(trim($_POST['productCode'])) : '';
            $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
            $price = isset($_POST['price']) ? htmlspecialchars(trim($_POST['price'])) : '';
            $quantity = isset($_POST['quantity']) ? htmlspecialchars(trim($_POST['quantity'])) : '';
            $storeId = isset($_POST['storeId']) ? htmlspecialchars(trim($_POST['storeId'])) : '';
            $productImage = isset($_POST['imageUpload']) ? htmlspecialchars(trim($_POST['imageUpload'])) : '';

            if ($productName != '' && $price != '' && $quantity != ''){
                $query = "INSERT INTO $this->table" ."(ProductName, quantity, price, description, productImageLocation, StoreId) VALUES (:name, :price, :quantity, :description, :productImageDir, 14)";
                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':name', $productName); 
                $stmt->bindParam(':price', $price); 
                $stmt->bindParam(':quantity', $quantity); 
                $stmt->bindParam(':description', $description); 
                $stmt->bindParam(':productImageDir', $productImageLocation);
            }   else {return false;}

            if ($stmt->execute()){
                return true;
            } else { return false;}
        } catch (Exeption $e)  { return false;}
    }

    public function show($table){

        $query = "SELECT * FROM " .htmlspecialchars($table) .";";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function search($value){
        $query = "SELECT * FROM products WHERE UPPER(ProductName) LIKE UPPER(:search);";
        $value = "%" .$value ."%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);
        
        if ($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else { return false;}

    }
    
    function __deconstruct(){
    $this->productName = null;
    $this->price = null;
    $this->quantity = null;
    $this->description = null;
    $this->productImage = null;
    $this->table = null;
    $this->conn = null ;

    }



}

?>