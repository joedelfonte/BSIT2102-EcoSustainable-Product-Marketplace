<?php
//This code is how php handle user input data and recieve data to database
//Example: 
//  UserInput-> Child-> Object1 <-> Database
//  Object1 -> LoginObjectVerified -> global

echo 'Hello PHP Object and Batabase Connection Testing' ."<br>";

//connectdb postgresql
// $connectinParam = 'host=localhost port=5432 dbname=PostgreSQL user=postgres password=0907';
// $userDbConnection = pg_connect($connectinParam);
// $result = pg_query($userDbConnection, 'select * from pg_stat_activity');
// var_dump(pg_fetch_all($result));//test connection

function opendb(){

//Connect Mysql DB
$conn = new mysqli('localhost', 'root', '', 'ecomarket');//connect to local database using xampp Mysql
   
    if ($conn) {//check if connection is established
        echo "Connected successfully <br>";
    } else { die("Connection failed ");}
     
    $result = $conn->query('SELECT * from userdata');
    if (mysqli_num_rows($result) > 0){

        while ($row = $result->fetch_assoc()){//puts all result in assiociative array named row
            echo 'ID: ' .$row['uid'] ."<br>" .' Name: ' .$row['NAME'];} 
    } else {echo 'Zero Query Results';};
            
};

opendb();

echo "<br>";
class UserData {
    private $password; //from user
    private $databseId; //db
    private $username; //from user
    private $permission; //db
    private $userStatus; //db
    
    function __construct ($uName, $password) {//input
        $this->username = $uName;
        $this->password = $password;
    }

    protected function dbrequest(){
        $dbResult = 0;
        //it request if the user input is correct or 
        //using query
        //if found, set all data need in the parent class
        echo 'Class Authentication Passed!' ."<br>";
    }

    protected function getdata(){
        return $this->username;
    }
    //in this class,only process the transaction to db to userTable
};

class LoginUserData extends UserData {
    //this class communicate all php or global requests
    //This Class is a controller in login

    function __construct($username, $pass){
        parent::__construct($username, $pass);
    }

    public function show(){
        $this->dbrequest();
        echo 'Username: ';
        echo $this->getdata();
    }

    
};

$person = new LoginUserData('user1', 001);
$person->show();
 


?>