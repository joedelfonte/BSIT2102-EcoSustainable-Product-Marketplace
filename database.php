<?php   
class Connection{
    private $host = 'localhost';
    private $dbname = 'ecomarketdatabase';
    private $username = 'userview';
    private $password = 'viewonly';
    private $conn;
    
    public function __construct(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    } 

    public function dbCloseConnection(){
        $conn = null;
    }

    public function getdatabase(){
        return $this->conn;

    }
    public function show($table){
        $query = "SELECT * FROM " .htmlspecialchars($table) .";";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
        
        
    } 

}

class CrudProduct{
    private $productName;
    private $price;
    private $quantity;
    private $description;
    private $productImage;
    private $table = 'products';
    private $conn;

    function __construct($db){
        $this->conn =$db;
        
     }

   public function initializeValues(){
        try {
            $productName = isset($_POST['productName']) ? htmlspecialchars(trim($_POST['productName'])) : '';
            $price = isset($_POST['price']) ? htmlspecialchars(trim($_POST['price'])) : '';
            $quantity = isset($_POST['quantity']) ? htmlspecialchars(trim($_POST['quantity'])) : '';
            $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
            $productImage = isset($_POST['imageUpload']) ? htmlspecialchars(trim($_POST['imageUpload'])) : '';
            
            $query = "INSERT INTO $this->table" ."(ProductName, quantity, price, description, productImageLocation, StoreId) VALUES (:name, :price, :quantity, :description, :productImageDir, 14)";
            $stmt = $this->conn->prepare($query);
        
            $stmt->bindParam(':name', $productName); 
            $stmt->bindParam(':price', $price); 
            $stmt->bindParam(':quantity', $quantity); 
            $stmt->bindParam(':description', $description); 
            $stmt->bindParam(':productImageDir', $productImageLocation);

        if ($stmt->execute()){
            return true;
        } else {return false;}

            if(empty($productName)){
                //throw
            }
        }   catch (exeption $error){
            echo 'Error Adding Product!';
        }
   }
}




?>