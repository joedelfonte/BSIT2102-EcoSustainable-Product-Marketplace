<?php  
class CookieCrud{
    private $cookieStatus;
    private $sessionId;
    
    function __construct(){//test cookies
        setcookie("test_cookie", "test_value", time() + 120, "/", "", true, true);
        $this->cookieStatus = isset($_COOKIE['test_cookie']);
    }

    function isCookieEnable() : bool {
        return $this->cookieStatus;
    }

    function createCookie($value) : bool {
        try {
            $result = setcookie("session", $value, time() + (30 * 24 * 60 * 60), "/", "", true, true);
            return $result;
        } catch (Exception $e) {
            error_log("Error setting cookie: " . $e->getMessage()); return false;
        }
        
    }

    function showCookie(){
        if(isset($_COOKIE['session'])){
            $this->sessionId = htmlspecialchars($_COOKIE['session']); 
            return $this->sessionId;
        } else {
            return false;
        }   
    }

    function __deconstruct(){//empty all session data
        //ad a query for last log_in
        $this->cookieStatus = null;
        $this->sessionId = null;
    }
}





?>