<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');

class Coookies extends Database {

    function __construct(){
        parent::__construct();
    }

    
}




?>