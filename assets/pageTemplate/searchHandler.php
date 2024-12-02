<?php
echo realpath(dirname(0));
require_once (realpath('./../.././config.php'));
require_once(ROOT_PATH .'\src\products\crudProd.php');
$temp = new Products();
// echo 'Hello reading file';

if (isset($_POST['liveSearch']) && !empty($_POST['liveSearch'])){
    $sVar = $_POST['liveSearch'];

    if (isset($sVar)){

        $result = $temp->searchOnlyProducts($sVar, 'ProductName');
    // var_dump($result);
        if ($result){
            foreach ($result as $row) { 
                echo "  <form action='../products/productDetails.php' method='GET'>
                            <input type='hidden' name='code' value='" .$row['productCode'] ."'>
                            <button type='submit' class='search-results result-item'>" .$row['ProductName'] ."</button>
                        </form>";
            //  echo "<div class='result-item'>" .$row['ProductName'] ."</div>";
            }
        }   else { echo "<div class='search-results'>Nos product name found</div>"; }
        
    }
}  else {
    echo "<div class='result-item'>Invalid Search Input</div>";
}

?>

