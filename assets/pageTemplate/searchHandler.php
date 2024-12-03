<?php
echo realpath(dirname(0));
require_once (realpath('./../.././config.php'));
require_once(ROOT_PATH .'\src\products\crudProd.php');
require_once (ROOT_PATH .'\src\products\productDetails.php');
$temp = new Products();
// echo 'Hello reading file';

if (isset($_POST['liveSearch']) && !empty($_POST['liveSearch'])){
    $sVar = $_POST['liveSearch'];

    if (isset($sVar)){
        $result = $temp->searchOnlyProducts($sVar, 'ProductName');
        // var_dump($result);
        //$handler = (ROOT_PATH .'\src\products\productHandler.php');
        if ($result){
  
            foreach ($result as $row) { 
            ?>
                <form action="/redirect.php" method="GET">
                    <input type='hidden' name='code' value="<?= $row['productCode'];?>">
                    <div type='submit' class='search-results result-item'><?= $row['ProductName']?></button>
                </form>

                <a href="">
                    <div type='submit' class='search-results result-item'><?= $row['ProductName']?></button>
                </a>
            <?php 
                
            }
        }   else { echo "<div class='search-results'>Nos product name found</div>"; }

?> 

</form> 

<?php
    }
}  else {
    echo "<div class='result-item'>Invalid Search Input</div>";
}

?>