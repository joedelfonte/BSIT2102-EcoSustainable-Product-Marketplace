<?php
require_once(ROOT_PATH .'\src\products\crudProd.php');

$userLists = new Users();
$user1 = $userLists->read();
$user1 = $userLists->executeQuery($userLists->userRoleStatusSummary());
var_dump($user1);

foreach($user1 as $allUser){
    $data[] = [
        'Eco_id' => $user1['EcoId'],
        'Name' => $user1['Name'],
        'Nickname' => $user1['nickname'],
        'Role' => $user1['role_id'],
    ];
};

?>