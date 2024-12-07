<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH . '/src/database/crudProd.php';
require_once ROOT_PATH . '/src/database/userCrud.php';

// echo $_GET['Uid'];
// echo $_GET['Pid'];
// header('Content-Type: application/json');
try {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['Uid'])) {
            $id = htmlspecialchars($_GET['Uid']);
            $user = new Users();
    
            if ($user->delete($id)) {
                echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete user']);
            }
        } else if (isset($_GET['Pid'])) {
            $uid = htmlspecialchars($_GET['Pid']);
            $prod = new Products();
            // echo $uid;
    
            if ($prod->delete($uid)) {
                echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);

        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    }
} catch (Exception $err) {
    error_log($err->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred']);
}
?>
