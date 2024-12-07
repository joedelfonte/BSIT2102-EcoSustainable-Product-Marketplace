<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH . '\src\database\crudProd.php';
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
require_once ROOT_PATH .'/src/database/category.php';
require_once ROOT_PATH . '\src\database\userCrud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Local CSS -->
    <link rel="stylesheet" href="/project/BSIT2102-EcoSustainable-Product-Marketplace/assets/css/form.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Products</title>
</head>
<body>
    <div class="page">
        <div class="form">
            <a href="/project/BSIT2102-EcoSustainable-Product-Marketplace/src/admin/showinfo.php" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                <i class="">Back</i>
            </a>
            <form class="forms-card" action="addProduct.php" method="POST" enctype="multipart/form-data">
                <h1>Add Product</h1><br>

                <select name="storeId" id="storeId" class="form-select" placeholder="Seller">
                    <?php
                        $cats = new Users();
                        if ($result = $cats->viewLeftStore()){
                            echo '<option value="">Select Seller</option>';
                            foreach ($result as $row) {
                                if ($row['role_id'] === 3){
                                    ?>
                                    <option value="<?= $row['store_id']?>"><?= htmlspecialchars($row['storeName']) ?></option>   
                                    <?php
                                }

                            }
                        }
                    ?>
                    
                </select>
                <br>
                <label for="Product">Product :</label>
                <input type="text" class="form-control" id="Product" name="productName" required><br>

                <label for="Price">Price :</label>
                <input type="number" class="form-control" name="price" id="Price" required><br>
                
                <label for="Quantity">Quantity :</label>
                <input type="number" class="form-control" name="quantity" id="Quantity" required><br>

                <label for="Description">Description</label><br>
                <textarea name="description" class="form-control" id="Description"></textarea><br>

                <p>Select One Main Category:</p>
                <select name="category" id="Category" class="form-select">
                    <?php
                    require_once ROOT_PATH . '\src\database\crudProd.php';
                        $cats = new CategoryCrud();
                        if ($result = $cats->showCategory()){
                            foreach ($result as $row) {
                                ?>
                                <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['name']) ?></option>   
                                <?php
                            }
                        }
                    ?>
                </select>
                <br>
                <label for="Image">Upload Product Image</label><br>
                <input type="file" name="image" id="Image" class="form-control"><br>

                <div class="form-group">
                    <input type="checkbox" class="form-check-input" name="terms" id="Terms" required>
                    <label for="Terms" class="form-check-label">Agree to <a href="#">Terms And Condition</a></label><br><br>
                </div>

                <button type="reset" class="btn btn-secondary">Reset</button>
                <input type="submit" class="btn btn-primary" value="Create">
            </form>
        </div>
    </div>
</body>
</html>

?>

