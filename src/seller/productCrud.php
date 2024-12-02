<?php
require_once('../src/database/database.php');
require_once('../src/fileHandler.php');

class ProductCrud extends Database {
    
    private $table = 'product';

    function __construct(){
        parent::__construct();
    }

    //Create Productaa
    public function addProduct(){
    //    $uFile = new FileUpload(); 
    //    $this->productImage = $uFile->addFile();
        try {
            $productName = isset($_POST['productName']) ? htmlspecialchars(trim($_POST['productName'])) : '';
            $productCode = isset($_POST['productCode']) ? htmlspecialchars(trim($_POST['productCode'])) : '';
            $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
            $price = isset($_POST['price']) ? htmlspecialchars(trim($_POST['price'])) : '';
            $quantity = isset($_POST['quantity']) ? htmlspecialchars(trim($_POST['quantity'])) : '';
            $storeId = isset($_POST['storeId']) ? htmlspecialchars(trim($_POST['storeId'])) : '';
            $category = isset($_POST['category']) ? htmlspecialchars(trim($_POST['category'])) : '0';
            $productImage = isset($_POST['imageUpload']) ? htmlspecialchars(trim($_POST['imageUpload'])) : '';
           
            if ($productName != '' && $price != '' && $quantity != ''){
                $query = "INSERT INTO $this->table" ."(ProductName, quantity, price, description, imageDir, store_id, category_id, status_id) VALUES (:name, :price, :quantity, :description, :productImageDir, 14, :category, 1)";
                $stmt = $this->conn->prepare($query);
    
                $stmt->bindParam(':name', $productName); 
                $stmt->bindParam(':price', $price); 
                $stmt->bindParam(':quantity', $quantity); 
                $stmt->bindParam(':description', $description); 
                $stmt->bindParam(':productImageDir', $productImageLocation);
                $stmt->bindParam(':category', $category);

            }   else {return false;}

            if ($stmt->execute()){
                return true;
            } else { 
                error_log('Error Executing Query');
                return false;
            }
    
        } catch (Exeption $e)  { 
            error_log($e);
            return false;}
    
    }

}

?>