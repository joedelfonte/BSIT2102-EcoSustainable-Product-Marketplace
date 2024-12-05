<?php
// echo realpath(dirname(0));
require_once (realpath('./../.././config.php'));
require_once(ROOT_PATH .'\src\products\crudProd.php');
// echo 'Hello reading file';

try {
    if (!empty($_POST['liveSearch'])){
        $sVar = htmlspecialchars($_POST['liveSearch']);
        $searchDump = new Products();
    
        $result = $searchDump->searchProducts($sVar, 'ProductName');
    
        // var_dump($result);
        if ($result){
            foreach ($result as $row) { 
            ?>
                <script>
                    function autofill(productName) {
                        document.getElementById('Search').value = productName;
                    }
                </script>
                <button class='result-item' type="button" onclick="autofill('<?= $row['ProductName'];?>')"><?= $row['ProductName']?></button>
            <?php 
            }
            $result = null;
            $searchDump = null;
        }   else { echo "<div class='search-results'>No Simillar Product Found</div>"; }
    
    } else {
        echo 'Search Engine Error';
    }
} catch (Exception $error) {

}

?>