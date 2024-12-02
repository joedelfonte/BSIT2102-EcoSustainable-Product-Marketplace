<?php 

class Database{
    private $host = 'localhost';
    private $dbname = 'eco_market_database';
    private $username = 'userview';//default ay root
    private $password = 'viewonly';//defalut ay wala laman
    protected $conn;

    public function __construct(){//contructor
        $this->conn = null;//clean container

        try {//test connection and prepare the pdo variable
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo 'Cannot onnect to Db';
            error_log("Connection error: " . $exception->getMessage());
            exit;
            
        }
    }

    public function getDatabase(){
        return $this->conn;
    }

    function __deconstruct() {
        $this->conn = null;
        $this->dbname = null;
        $this->username = null;
        $this->password = null;
        $this->host = null;
    }
}
?>