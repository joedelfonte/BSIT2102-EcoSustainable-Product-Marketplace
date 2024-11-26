<?php
require_once('cookiesCrud.php');
include('others.php');

randString();

try {
    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        $cookieMain = new CookieCrud();
        $value = $_POST['sessiondat'];
        $result = $cookieMain->createCookie(htmlspecialchars($value));
        
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            
            echo json_encode(['success' => false, 'message' => 'Failed to create cookie.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    }

} catch (Exception $es) {
        error_log('Error' .$es .__FILE__);
    }
 
?>
