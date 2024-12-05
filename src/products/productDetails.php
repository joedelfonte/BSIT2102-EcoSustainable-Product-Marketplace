<?php
    require_once realpath(dirname(__FILE__) . '/../../config.php');
    require_once('crudProd.php');
    echo '1';
    // require_once('../database/database.php');
    //require('../../assets/header.php');
    try {
        if (isset($_GET['code'])){
            $ltemp = strlen($_GET['code']);
            
            if ($ltemp = 7){
                $code = htmlspecialchars(trim($_GET['code']));
                $product = new Products();
                $result = $product->selectProducts($code, 1);
                $prodImg = $row['imageDir'] = null ? $row['imageDir'] : '';

                    if ($result) {
                        ?>
                        <div class="full-details">
                            <div class="product-container">
                                <div class="product-image">
                                    <img src="<?php $prodImg ?>" alt="Product Image">
                                </div>
                                <div class="product-details">
                                    <?php  
                                        //var_dump($result);
                                        foreach($result as $row){
                                        ?>
                                        <h1 class="product-title"><?= $row['ProductName']?></h1>
                                        <p class="product-description"><?= $row['description']?></p>
        
                                        <div class="product-price">Price : <?= $row['price']?></div>
                                        <div>Stocks :<?= $row['quantity']?></div>
                                        <div class="quantity-container">
                                            <span>Quantity :</span>
                                            <input type="number" id="quantity" value="1" min="1">
                                        </div><br>
                                        <button class="add-to-cart-btn">Add to Cart</button>
                                        <?php
                                        }
                                    ?>
                
                                    
                                </div>
                            </div>
                
                            <div class="product-container">
                                <h5 class="rating-head">Description</h5>
                            </div>
        
                            <div class="mall-container">
                                <h5 class="rating-head">Store</h5>
                                <div class="malldetails">
                                    <div class="mall-image">
                                        <img src="" alt="Store Image">
                                    </div>
                                    <div class="product-details">
                                        <a href="" class="custom-link" style="text-decoration: none; color: inherit;" id='mylink'><h5><?= $row['storeName'] ?></h5></a>
                                        <p><?= $row['storeDescription'] ?></p>
                                    </div>
                                
                                </div>
                            </div>
                
                            
                
                            <div class="product-container full-details">
                                <h5 class="rating-head">Rating</h5>
                                <div class="product-details"><span>Rating Content</span></div>
                            </div>
                        </div>
                        <?php
                    }else {
                        include_once('../../error.html');
                    ?>   
                    <?php
        
                    }     
            } else {
                $code = null;
                $e = 'Error Product Code Sent';
            }
        
        }
        
    }   catch (Exeption $e){
        include_once('../../error.html');
        error_log($e);
        $code = NULL;
    }

    

?>

</body>
</html>
