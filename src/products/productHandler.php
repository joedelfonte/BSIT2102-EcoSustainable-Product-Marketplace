<?php

try {
    if (isset($_GET['code'])){
        $ltemp = strlen($_GET['code']);
        
    
        if ($ltemp = 7){
            $code = htmlspecialchars(trim($_GET['code']));
        } else {
            $code = null;
            $e = 'Error Product Code Sent';
        }
    
        $product = new Products();
        $result = $product->selectProducts($code, 1);

        $prodImg = $row['imageDir'] = null ? $row['imageDir'] : '';
    
        //if (a){};
    }
    
}   catch (Exeption $e){
    include_once('../../error.html');
    error_log($e);
    $code = NULL;
}

?>