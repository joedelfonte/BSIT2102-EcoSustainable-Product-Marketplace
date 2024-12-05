<?php
    require_once ('../database/productCrud');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $user = new ProductCrud();

        if (!$user->addProduct()) {
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Product Creation Failed</title>
                
            </head>
            <body>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
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