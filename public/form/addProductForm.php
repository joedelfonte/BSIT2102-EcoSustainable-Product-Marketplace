<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Add Products</title>
</head>
<body>
    <div class="page">
        
        <div class="form">
        <a href="#" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            <i class="">Back</i>
        </a>
        <form class="forms-card" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <h1>Add Product</h1><br>

            <div class="row">
                <input class="col form-control" type="text" placeholder="Store1" readonly>
                <input class="col form-control" type="text" placeholder="Seller1" readonly>
            </div><br>

            <label for="Product">Product :</label>
            <input type="text" class="form-control" id="Product" name="productName" require><br>

            <label for="Price">Price :</label>
            <input type="number" class="form-control" name="price" id="Price" require><br>
            
            <label for="Quantity">Quantity :</label>
            <input type="number" class="form-control" name="quantity" id="Quantity" require><br>

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

<!-- Add Product Process -->
<?php
    require_once('../../src/database.php');
    require_once('../../src/crudDatabse.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $database1  = new Connection();
        $user = new CrudProducts($database1->getDatabase());

        if (!$user->addProduct()) {
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Product Creation Failed</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Product Creation Failed',
                    showConfirmButton: true,
                    confirmButtonText: 'Retry'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'addProductForm.php';
                    }
                });
            </script>
            </body>
            </html>
            ";
        } else {
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Added Product</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Product Created',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'addProductForm.php';
                    }
                });
            </script>
            </body>
            </html>
            ";
        }
    }
?>

