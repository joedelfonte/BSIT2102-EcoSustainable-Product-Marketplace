<?php
require_once '../../config.php';
require_once(ROOT_PATH .'\src\users\userCrud.php');
require_once(ROOT_PATH . '\src\database\database.php');

try {

$dataTable = new Users();
$result = $dataTable->readAll();

foreach($result as $row) {
    $data[] = $row;
}

// Prepare data
$response = [
    "data" => $data
];

echo json_encode($response);

} catch  (Exception $error){
    error_log($error);
    header('error.php');
}

?>
