<link rel="stylesheet" href="../../assets/css/library.css">
<?php
require_once ('./../../config.php');
require_once(ROOT_PATH .'\src\products\crudProd.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';

try {
    if (!empty($_GET['search'])){
        $searchVar = htmlspecialchars($_GET['search']);
        $searchDump = new Products();
        $resultTemp = $searchDump->searchProducts($searchVar, 'ProductName');

        if ($resultTemp) {
            ?>
                <div class='container-l'>
                <h1>Showing related Results for '<?= $searchVar;?>'</h1>
                <div class="product-grid">
            <?php
            foreach($resultTemp as $row){
            ?>
                <a href="productDetails.php?product=<?= $row['productCode'];?>&auth=1">
                <div class="product-card">
                    <img src="<?= $row['imageDir'];?>" alt="<?= $row['ProductName'];?>" class="product-image">
                    <div class="product-details">
                        <h2 class="product-title"><?= $row['ProductName'];?></h2>
                        <p><?= $row['description'];?></p>
                        <p class="product-price"><?= $row['price'];?></p>
                    </div>
                </div>
                </a>
            <?php
            }
            ?>
            </div>

    
            <?php
        } else {
            echo "
            <body>
                <div class='container-l'>
                    <h1>Showing related Results for '$searchVar'</h1><br>
                    <h4>No Similar Products Found</h4>
                </div>
            </body>";
        }
    } else {throw $err;}
} catch (Exception $err) {
    header('/currdir\BSIT2102_EcoSustainable_Product_Marketplace\assets\pageTemplate\error.html');
}


?>
