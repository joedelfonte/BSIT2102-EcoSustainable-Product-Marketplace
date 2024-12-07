<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once(ROOT_PATH . '\src\database\database.php');
require ROOT_PATH .'/assets/pageTemplate/header.php';
// Instantiate the Database class and connect
$db = new Database();
$pdo = $db->getDatabase();
$successMessage = ""; // Initialize success message

if ($pdo) {
    try {
        // Check if the product ID is provided
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $productId = intval($_GET['id']); // Get the product ID from the query string

            // Fetch product details for editing
            $sqlProduct = "SELECT * FROM product WHERE id = :id";
            $stmtProduct = $pdo->prepare($sqlProduct);
            $stmtProduct->execute([':id' => $productId]);
            $product = $stmtProduct->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $productName = $_POST['ProductName'] ?? $product['ProductName'];
                    $description = $_POST['description'] ?? $product['description'];
                    $price = $_POST['price'] ?? $product['price'];

                    // Update the product in the database
                    $updateSql = "UPDATE product SET ProductName = :ProductName, description = :description, price = :price WHERE id = :id";
                    $stmtUpdate = $pdo->prepare($updateSql);
                    $stmtUpdate->execute([
                        ':ProductName' => $productName,
                        ':description' => $description,
                        ':price' => $price,
                        ':id' => $productId
                    ]);

                    $successMessage = "Product updated successfully.";
                }
            } else {
                echo "<div class='error-message'>Product not found.</div>";
            }
        } else {
            echo "<div class='error-message'>No product ID provided.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='error-message'>Query failed: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='error-message'>Database connection failed.</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-actions {
            text-align: center;
        }
        .form-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-actions button:hover {
            background-color: #0056b3;
        }
        .success-message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }
        .error-message {
            text-align: center;
            color: red;
            margin-bottom: 15px;
        }
        .exit-button {
            text-align: center;
            display: block;
            margin: 20px auto;
            color: #007bff;
            text-decoration: none;
        }
        .exit-button:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php
            // var_dump($product);
        if (!empty($successMessage)): ?>
            <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
        <?php endif; ?>
        <?php if (isset($product)): ?>
            <h2>Edit Product</h2>
            <form method="post">
                <div class="form-group">
                    <label for="ProductName">Product Name:</label>
                    <input type="text" id="ProductName" name="ProductName" value="<?= htmlspecialchars($product['ProductName']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Update Product</button>
                </div>
                <a href="/project/BSIT2102-EcoSustainable-Product-Marketplace/src/products/productDetails.php?product=<?= htmlspecialchars($product['productCode']) ?>" class="exit-button">Back to Product Info</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
