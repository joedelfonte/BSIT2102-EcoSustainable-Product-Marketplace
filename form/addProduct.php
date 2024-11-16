<?php
require_once('../database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $database1  = new Connection();
    $db = $database1->getdatabase();
    $user = new CrudProduct($db);
    if($user->initializeValues()){
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
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                    window.location.href = 'addProductForm.php';
                });

        </script>

        </body>
        </html>
        ";
    }
    
}
?>