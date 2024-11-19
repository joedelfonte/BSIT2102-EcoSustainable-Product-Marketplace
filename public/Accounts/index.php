<?php
//This code is how php handle authentication data from user iput and database

echo 'Hello PHP Object and Database Connection Testing' ."<br>";

class AuthenticateUser {
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
        //if found, request all data need to the parent class
        echo 'Class Authentication Passed!' ."<br>";
    }

    protected function getdata(){
        return $this->username;
    }
    //in this class,only process the transaction to db to userTable
};

class LoginUserData extends UserData {
    //this class communicate all php or global requests
    //This Class is a controller

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