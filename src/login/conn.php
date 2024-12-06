<?php

class Database {
    private $servername = "localhost";
    private $dbname = "db1";
    private $username = "root";
    private $password = "";
    public $charset = "utf8mb4";
    private $pdo;

    // Connect to the database
    public function connect() {
        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$db = new Database();
$pdo = $db->connect();

?>