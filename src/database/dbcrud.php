<?php
require_once('init.php');

class DbCrud extends Query{
    private $dbconn;

    function __construct(){//call the da=b init
        $openConn = new Database();
        $dbconn = $openConn->getDatabase();
    }

    protected function create($table, ){

    }
}


?>