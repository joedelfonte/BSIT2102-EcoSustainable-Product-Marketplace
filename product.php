<?php

class Product{
    protected $productId, $productname, $quantity, $price;
    protected $description, $seller; 

    function __construct($id, $name, $quantity, $price){
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

class GetDatabase extends Product {
    private $database;

    __construct(){
        $conn = new mysqli('localhost', 'user', '', 'ecomarket');//connect to local database using xampp Mysql
   
        if ($conn) {//check if connection is established
            echo "Connected successfully <br>";
        } else { die("Connection failed ");}
     
    }
}


?>