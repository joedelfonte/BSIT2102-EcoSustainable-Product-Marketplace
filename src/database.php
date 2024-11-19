<?php   
class Connection{
    private $host = 'localhost';
    private $dbname = 'ecomarketdatabase';
    private $username = 'userview';//default ay root
    private $password = 'viewonly';//defalut ay wala laman
    private $conn;
    
    public function __construct(){//contructor copy paste lang yan
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

    public function getDatabase(){
        return $this->conn;

    }

    function _deconstruct() {
        $this->conn = null;
        return null;
        echo 'Session Ended';
    }
    

}






?>