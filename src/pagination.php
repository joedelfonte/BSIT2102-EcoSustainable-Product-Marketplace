<?php
require_once ('../../src/database.php');
$database1 = new Connection();
$productsPerPage = 6; // Number of products per page

// Get the current page number from the query string, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $productsPerPage;

// Fetch the total number of products
$totalProductsQuery = $database1->dbConnection->query("SELECT COUNT(*) FROM products");
$totalProducts = $totalProductsQuery->fetchColumn();
$totalPages = ceil($totalProducts / $productsPerPage);

// Fetch products for the current page
$productsQuery = $database1->dbConnection->query("SELECT * FROM products LIMIT $start, $productsPerPage");
$products = $productsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-Market Products</title>
    <link rel="icon" href="../icons/eco-banner.png" type="image/x-icon">

    <!-- CSS Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/home.css">
    <style>
        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product h3 {
            font-size: 1.5rem;
            color: #333;
            margin: 10px 0;
        }

        .product p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .product h4 {
            font-size: 1.25rem;
            color: #28a745;
        }

        .no-product {
            text-align: center;
            margin-top: 50px;
        }

        /* Responsive Design */
        @media (max-width: 767px) {
            .product-list {
                grid-template-columns: 1fr; /* Single column on small screens */
                gap: 10px; /* Reduce gap size */
            }

            .product h3 {
                font-size: 1.25rem; /* Adjust font size */
            }

            .product p {
                font-size: 0.9rem; /* Adjust font size */
            }

            .product h4 {
                font-size: 1rem; /* Adjust font size */
            }
        }
    </style>
</head>
<body>
<header class="">
    <nav class="py-2 border-bottom header-tops">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="home.php" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="products/products.php" class="nav-link link-body-emphasis px-2">Products</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">About</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Login</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Sign up</a></li>
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom header-top">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <img src="../icons/eco-logo.png" alt="Eco-Marketplace Logo" class="logo">
                <span class="fs-4">Eco-MarketPlace</span>
            </a>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                <input type="search" class="form-control" placeholder="Search Product" aria-label="Search">
            </form>
        </div>
    </header>
</header>
<div class="container">
    <h1>Eco Products</h1>
    <div class="product-list">
        <?php
        if ($products) {
            foreach ($products as $row) {
                ?>
                <div class="product">
                    <img src="<?= $row["productImageLocation"]; ?>" alt="<?= $row["ProductName"]; ?>">
                    <h3><?= $row["ProductName"]; ?></h3>
                    <p><?= $row["description"]; ?></p>
                    <h4><?= $row["price"]; ?></h4>
                </div>
                <?php
            }
        } else {
            ?>
            <h1 class="no-product">No Product Found</h1>
            <?php
        }
        ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>
