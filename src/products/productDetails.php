<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Quantity</title>
    <link rel="stylesheet" href="singleProd.css">
</head>
<body>

<?php
    require_once('../database/database.php');
    require_once('crudProd.php');
    require('../../assets/header.php');
    require_once('productHandler.php');

    try {
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
    } catch (Exeption $err){

    };



?>

</body>
</html>
