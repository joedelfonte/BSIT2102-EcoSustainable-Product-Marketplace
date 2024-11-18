<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Products</title>
</head>
<body>
    <div class="product-list">
        
        <div class="">
        <form class="forms-card" action="addProduct.php" method="POST">
            <br><h1>Add Product</h1><br>

            <div class="row">
                <input class="col form-control" type="text" placeholder="Store1" readonly>
                <input class="col form-control" type="text" placeholder="Seller1" readonly>
            </div><br>

            <label for="Product">Product :</label>
            <input type="text" class="form-control" id="Product" name="productName" require><br><br>

            <label for="Price">Price :</label>
            <input type="number" class="form-control" name="price" id="Price" require><br>
            
            <label for="Quantity">Quantity :</label>
            <input type="number" class="form-control" name="quantity" id="Quantity" require><br><br>

            <label for="Description">Description</label><br>
            <textarea name="description" class="form-control" id="Description"></textarea><br><br>

            <label for="Image">Upload Product Image</label><br>
            <input type="file" name="image" id="Image"><br><br>

            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="terms" id="Terms">
                <label for="Terms" class="form-check-label">Agree to Terms And Condition</label><br><br>
            </div>

            <button type="reset" class="btn btn-reset">Reset</button>
            <input type="submit" class="btn btn-primary" value="Create">
        </form>

        </div>
        

    </div>
    
</body>
</html>

