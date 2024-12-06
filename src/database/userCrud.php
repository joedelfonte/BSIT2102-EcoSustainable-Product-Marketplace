<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH . '/src/database/database.php');

class Users extends Database {
    private $table = 'users';
    private $queryResult;

    function __construct(){
        parent::__construct();
    }

    public function getconn(){
        return $this->conn;
    }

    public function addAccount($email, $password) {
        $email = isset($email) ? htmlspecialchars($email) : '';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $mysql = "INSERT INTO users (`role_id`, `email`, `status_id`, `password`) 
                  VALUES (1, :email, 1, :password)";
    
        $stmt = $this->conn->prepare($mysql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
    
        return $stmt->execute();
    }
    

    public function search($value, $column){
        $value = isset($value) ? htmlspecialchars($value) : '';
        $query = "SELECT * FROM $this->table WHERE LOWER($column) LIKE LOWER(:search);";

        $value = "%" . $value . "%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $value);

        if ($stmt->execute()){
            $this->queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->queryResult;
        } else {
            return false;
        }
    }

    public function readAll($id){
        $sqlQuery = "SELECT * FROM users WHERE id = :ID;";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(':ID', $id);

        if ($stmt->execute()){
            $this->queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($this->queryResult)){
                return false;
            } else {
                return $this->queryResult;
            }
        } else {
            return false;
        }
    }

    public function readLog($email){
        $sqlQuery = "SELECT * FROM users WHERE email = :ID;";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(':ID', $email);

        if ($stmt->execute()){
            $this->queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($this->queryResult)){
                return false;
            } else {
                return $this->queryResult;
            }
        } else {
            return false;
        }
    }

    public function updateUserProfile($ecoId, $username, $name, $gender, $address){
        echo $ecoId;
        $query = "UPDATE users SET 
                    username = :username,
                    Name = :name,
                    gender = :gender,
                    address = :address
                    WHERE id = :Id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Id', $ecoId);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        // $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);

        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Query Excecution Error: " . $e->getMessage();
        }

        
    }

    public function delete($id){
        $sqlQuery = "DELETE FROM users WHERE EcoId = :ID;";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(':ID', $id);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>
