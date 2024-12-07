<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
require_once ROOT_PATH . '\src\database\database.php';
require_once ROOT_PATH . '\src\database\userCrud.php';
require_once ROOT_PATH . '\src\database\crudProd.php';
?>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
        }
        .table-container {
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .table-header {
            background-color: green;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            font-weight: bold;
        }
        .table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .edit-icon {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .edit-icon:hover {
            color: #0056b3;
        }
        .display {
            width: 100%;
        }
    </style>
</head>
<body>
    <script>
$(document).ready(function() {
    $('#usersTable').DataTable();
    $('#productsTable').DataTable();
});

function deleteUser(userId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete.php',
                type: 'GET',
                data: { Uid: userId },
                success: function(response) {
                    var result = JSON.parse(response);
                    Swal.fire({
                        position: "top-end",
                        icon: result.success ? "success" : "error",
                        title: result.message,
                        showConfirmButton: true, // Ensure the button is shown
                        timer: 1500,
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page after user confirms
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred while trying to delete the user.'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page after user confirms
                        }
                    });
                }
            });
        }
    });
}

function deleteProduct(Id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete.php',
                type: 'GET',
                data: { Pid: Id },
                success: function(response) {
                    var result = JSON.parse(response);
                    Swal.fire({
                        position: "center",
                        icon: result.success ? "success" : "error",
                        title: result.message,
                        showConfirmButton: true, // Ensure the button is shown
                        timer: 1500,
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page after user confirms
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred while trying to delete the product.'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page after user confirms
                        }
                    });
                }
            });
        }
    });
}

    </script>
</body>
</html>

<?php
$db = new Users();
$prod = new Products();

if ($db) {
    try {
        // Fetch data from the users table
        $users = $db->view();
        $products = $prod->view();

        // Display users table data
        if ($users) {
            echo "<div class='table-container'>";
            echo "<div class='table-header'>Users</div>";
            echo "<div class='table-scroll'>";
            echo "<table id='usersTable' class='display' style='width:100%;'>";
            echo "<thead><tr>";
            foreach (array_keys($users[0]) as $column) {
                echo "<th>" . htmlspecialchars($column) . "</th>";
            }
            echo "<th>Action</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            foreach ($users as $user) {
                echo "<tr>";
                foreach ($user as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "<td>
                        <a href='/project/BSIT2102-EcoSustainable-Product-Marketplace/src/users/edit_user.php?id=" . htmlspecialchars($user['id']) . "' class='edit-icon'>Edit</a>
                        <a class='edit-icon' onclick='deleteUser(" . htmlspecialchars($user['id']) . ")'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody></table></div></div>";
            echo "<a href='/project/BSIT2102-EcoSustainable-Product-Marketplace/src/seller/addProductForm.php'><div class='edit-icon'>Add Product</div></a><br>";
        } else {
            echo "<div class='table-container'>No users found.</div>";
        }

        // Display product table data
        if ($products) {
            echo "<div class='table-container'>";
            echo "<div class='table-header'>Products</div>";
            echo "<div class='table-scroll'>";
            echo "<table id='productsTable' class='display' style='width:100%;'>";
            echo "<thead><tr>";
            foreach (array_keys($products[0]) as $column) {
                echo "<th>" . htmlspecialchars($column) . "</th>";
            }
            echo "<th>Action</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            foreach ($products as $product) {
                echo "<tr>";
                foreach ($product as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "<td><a href='/project/BSIT2102-EcoSustainable-Product-Marketplace/src/products/edit_product.php?id=" . htmlspecialchars($product['id']) . "' class='edit-icon'>Edit</a>
                        <a class='edit-icon' onclick='deleteProduct(" . htmlspecialchars($product['id']) . ")'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody></table></div></div>";
        } else {
            echo "<div class='table-container'>No products found.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='table-container'>Query failed: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='table-container'>Database connection failed.</div>";
}
?>

