<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH . '\src\database\crudProd.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $productName = isset($_POST['productName']) ? htmlspecialchars(trim($_POST['productName'])) : '';
        $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
        $price = isset($_POST['price']) ? htmlspecialchars(trim($_POST['price'])) : '';
        $quantity = isset($_POST['quantity']) ? htmlspecialchars(trim($_POST['quantity'])) : '';
        $storeId = isset($_POST['storeId']) ? htmlspecialchars(trim($_POST['storeId'])) : '';
        $category = isset($_POST['category']) ? htmlspecialchars(trim($_POST['category'])) : '0';

        //add create code
        function generateProductCode() {
            $prefix = "ECO";
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generates a 4-digit number with leading zeros
            return $prefix . $randomNumber;
        }
        $productCode = generateProductCode();

        $user = new Products();
        $return = $user->addProduct($productName, $storeId, $price, $quantity, $description,  $category, $productCode);
    
        if ($return = true) {
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
                        window.location.href = '/project/BSIT2102-EcoSustainable-Product-Marketplace/src/admin/showinfo.php';
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
        }
    }   