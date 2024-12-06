<?php
require_once 'dbcon.php'; // Include your database connection class

// Instantiate the Database class and connect
$db = new Database();
$pdo = $db->connect();

if ($pdo) {
    try {
        // Fetch data from the users table
        $sqlUsers = "SELECT * FROM users";
        $stmtUsers = $pdo->prepare($sqlUsers);
        $stmtUsers->execute();
        $users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

        // Fetch data from the product table
        $sqlProduct = "SELECT * FROM product";
        $stmtProduct = $pdo->prepare($sqlProduct);
        $stmtProduct->execute();
        $products = $stmtProduct->fetchAll(PDO::FETCH_ASSOC);

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
                echo "<td><a href='edit_user.php?id=" . htmlspecialchars($user['id']) . "' class='edit-icon'>Edit</a></td>";
                echo "</tr>";
            }
            echo "</tbody></table></div></div>";
        } else {
            echo "<div class='table-container'>No users found.</div>";
        }

        // Display product table data
        if ($products) {
            echo "<div class='table-container'>";
            echo "<div class='table-header'>Product</div>";
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
                echo "<td><a href='edit_product.php?id=" . htmlspecialchars($product['id']) . "' class='edit-icon'>Edit</a></td>";
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

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
            background-color: #007bff;
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
    </script>
</body>
</html>
