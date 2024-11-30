<?php
require_once dirname('../config.php') . '\config.php';
require_once(ROOT_PATH .'\src\products\crudProd.php');

if (isset($_POST['liveSearch']) && !empty($_POST['liveSearch'])){
    $sVar = $_POST['liveSearch'];

    if (isset($sVar)){

        $temp = new Products();
        $result = $temp->searchOnlyProducts($sVar, 'LIKE', 'ProductName');
       // var_dump($result);
        if ($result){
            foreach ($result as $row) { 
                echo "  <form action='../products/productDetails.php' method='GET'>
                            <input type='hidden' name='code' value='" .$row['productCode'] ."'>
                            <button type='submit' class='search-results'>" .$row['ProductName'] ."</button>
                        </form>";
              //  echo "<div class='result-item'>" .$row['ProductName'] ."</div>";
            }
        }   else { echo "<div class='result-item'>No product name found</div>"; }
        
    }
}

?>

