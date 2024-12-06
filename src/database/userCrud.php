<?php
require_once '../../config.php';
require_once(ROOT_PATH . '/src/database/database.php');

class Users extends Database {
    private $table = 'users';
    private $queryResult;
    private $nickname;
    private $gender;
    private $role_id;
    private $email;
    private $address;
    private $profileImage;
    private $DateCreated;
    private $username;
    private $password;

    function __construct(){
        parent::__construct();
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

    function readAll($id){
        $sqlQuery = "SELECT * FROM users WHERE EcoId = :ID;";
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

    public function updateUserProfile($ecoId, $username, $nickname, $gender, $email, $address){
        // Store data in variables
        $this->ecoId = htmlspecialchars($ecoId);
        $this->username = htmlspecialchars($username);
        $this->nickname = htmlspecialchars($nickname);
        $this->gender = htmlspecialchars($gender);
        $this->email = htmlspecialchars($email);
        $this->address = htmlspecialchars($address);

        // Update query
        $query = "UPDATE `users` SET 
                    `username` = :username,
                    `nickname` = :nickname,
                    `gender` = :gender,
                    `email` = :email,
                    `address` = :address
                  WHERE EcoId = :ecoId;";

        // Prepare and bind parameters
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ecoId', $this->ecoId);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':nickname', $this->nickname);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);

        // Execute the statement
        return $stmt->execute();
    }
}
?>
