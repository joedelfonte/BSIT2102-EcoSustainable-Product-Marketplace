<?php 

class Database{
    private $host = 'localhost';
    private $dbname = 'eco-marketbase-database';
    private $username = 'userview';
    private $password = 'viewonly';
    protected $conn;

    public function __construct(){//contructor
        $this->conn = null;

        try {//test connection
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
}
?>