<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH .'/src/database/crudProd.php');
require ROOT_PATH .'/assets/pageTemplate/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="singleProd.css">

<?php
try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['product'])) {
        $ltemp = strlen($_GET['product']);
        
        if ($ltemp == 7) { // use comparison operator ==
            $code = htmlspecialchars(trim($_GET['product']));
            $product = new Products();
            $result = $product->readAll($code, 1);
            
            if ($result) {
                foreach($result as $row) {
                    $prodImg = $row['imageDir'] ? htmlspecialchars($row['imageDir']) : ''; 
                    ?>
                    <div class="full-details">
                        <div class="product-container">
                            <div class="product-image">
                                <img src="<?= $prodImg ?>" alt="Product Image"> <!-- corrected image source -->
                            </div>
                            <div class="product-details">
                                <h1 class="product-title"><?= htmlspecialchars($row['ProductName']) ?></h1>
                                <p class="product-description"><?= htmlspecialchars($row['description']) ?></p>
                                <div class="product-price">Price : &#8369; <?= htmlspecialchars($row['price']) ?></div>
                                <div>Stocks : <?= htmlspecialchars($row['quantity']) ?></div>
                                <div class="quantity-container">
                                    <span>Quantity :</span>
                                    <input type="number" id="quantity" name="addHowMany" value="1" min="1">
                                </div><br>
                                <button type="submit" id="addCart" name="AddToCart" class="add-to-cart-btn">Add to Cart</button>
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
                                    <a href="" class="custom-link" style="text-decoration: none; color: inherit;" id='mylink'><h5><?= htmlspecialchars($row['storeName']) ?></h5></a>
                                    <p><?= htmlspecialchars($row['storeDescription']) ?></p>
                                </div>
                            </div>
                        </div>
            
                        <div class="product-container full-details">
                            <h5 class="rating-head">Rating</h5>
                            <div class="product-details"><span>Rating Content</span></div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                throw new Exception('No products found.');
            }
        } else {
            throw new Exception('Invalid product code length.');
        }
    } else {
        throw new Exception('Invalid request method or missing product parameter.');
    }
} catch (Exception $e) {
    include_once(ROOT_PATH .'/assets/pageTemplate/error.html');
    error_log($e->getMessage());
    $code = NULL;
}
?>

<script>
$(document).ready(function() {
    const thisProduct = "<?= htmlspecialchars($row['productCode']); ?>";
    $('#addCart').on('click', function() {
        $.ajax({
            type: 'POST',
            url: "/project/BSIT2102-EcoSustainable-Product-Marketplace/src/products/AddtoCart.php",
            data: { 
                productCode: thisProduct,
                count: $('#quantity').val(),
                userEcoId: '1'
            },
            success: function(response) {
                let responseObject = JSON.parse(response);
                console.log('response:', responseObject.status);
                if (responseObject.status == 'success') {
                    Swal.fire({
                        title: 'Success',
                        text: responseObject.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: responseObject.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to Fetch Data: ' + error); 
            }
        });
    });
});
</script>

</body>
</html>
