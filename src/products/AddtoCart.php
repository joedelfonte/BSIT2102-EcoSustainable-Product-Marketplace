<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once 'crudProd.php';
try {
        
    if (isset($_POST['productCode'])){
        $productID = $_POST['productCode'];

        if (strlen($productID) != 7){
            $err = 'Wrong Id Count';
        }

        echo json_encode(['status' => 'success', 'message' => 'Added to Cart Successfully']);
    
    }

} catch (Exception $err) {

}


?>