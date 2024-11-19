<?php
include_once('database.php');

class CrudProducts{
    private $productName;
    private $price = 'a';
    private $quantity;
    private $description;
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
            $price = isset($_POST['price']) ? htmlspecialchars(trim($_POST['price'])) : '';
            $quantity = isset($_POST['quantity']) ? htmlspecialchars(trim($_POST['quantity'])) : '';
            $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
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
}

?>