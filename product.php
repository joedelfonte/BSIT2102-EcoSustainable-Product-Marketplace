<?php
require_once 'connect.php';

class Product{
    protected $productId, $productname, $quantity, $price;
    protected $description, $seller; 

    function __construct(){
        $tempconn = new Connection();
        $tempconn->connect();
    }

    private function setData($id, $name, $quantity, $price){
        $this->productId = $id;
        $this->productname = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getName(){
        return $productName;
    }
    public function getId(){
        return $productId;
    }
    public function getQuantity(){
        return $quantity;
    }
    public function getPrice(){
        return $price;
    }
    public function getDescription(){
        return $description;
    }
    public function getSeller(){
        return $seller;
    }

}

$test = new Product();

//set data
function getproduct(){
    

}
?>