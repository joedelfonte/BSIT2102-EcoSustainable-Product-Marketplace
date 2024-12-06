<link rel="stylesheet" href="../../assets/css/library.css">
<?php
require_once ('./../../config.php');
require_once(ROOT_PATH .'\src\database\crudProd.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';

try {
    $searchDump = new Products();
    if (isset($_GET['search']) != '' && isset($_GET['page'])){
        $searchVar = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
        $offset = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;

        ?>
        <div class='container-l'>
        <h1>Showing related Results for '<?= $searchVar;?>'</h1>
        <div class="product-grid">
        <?php
    } else if (isset($_GET['page'])){
        $setoffset = isset($_GET['page']) ? htmlspecialchars($_GET['page']) * 9 : 0;
        $setOffset = $_GET['page'];
        $searchVar = '';
        ?>
        <div class='container-l'>
        <h1>All Products</h1><br>
        <div class="product-grid">
        <?php
    } else {
        throw new Exception('Error Link');
    }

    $resultTemp = $searchDump->searchProducts($searchVar, 'ProductName');

    for ($i = $setOffset; $i < 10; $i++) { 
        $row = $resultTemp[$i];
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

    if ((count($resultTemp) % 10) == 0) {
        $totalPages = (count($resultTemp) / 10);
    } else {
        $totalPages = (count($resultTemp) / 10) + 1;
    }

} catch (Exception $err){
    error_log($err);
    include (ROOT_PATH .'/assets/pageTemplate/error.html');
}