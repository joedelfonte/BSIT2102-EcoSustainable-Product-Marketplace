<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
// require_once 'crudProd.php';

try {
    if (isset($_POST['productCode'])) {
        $productID = $_POST['productCode'];

        if (strlen($productID) != 7) {
            echo json_encode(['status' => 'error', 'message' => 'ProductId Problem']);
            exit;
        }

        echo json_encode(['status' => 'success', 'message' => 'Added to Cart Successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No Product Added']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
