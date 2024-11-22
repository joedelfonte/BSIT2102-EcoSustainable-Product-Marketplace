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
    
</head>
<body>
<header class="">
    <nav class="py-2 border-bottom header-tops">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="../home.php" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="products.php" class="nav-link link-body-emphasis px-2">Products</a></li>
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
            <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search" action="./search.php" method="GET">
                <input type="search" class="form-control" name="search" id="Search" placeholder="Search Product" aria-label="Search">
            </form>
        </div>
    </header>
</header>

<div class="container">
    <h1>Eco Products</h1>
    <div class="product-list">
        <?php
        require_once ('../../src/database.php');
        require_once ('../../src/crudDatabase.php');

        try {
            $database1 = new Connection();
            $products = new CrudProducts($database1->getDatabase());
                
            //  $database1->dbConnect();
            $result = $products->show('products');

            if ($result) {
                foreach ($result as $row) {
                    ?>
                    <div class="product">
                        <img src="<?= $row["productImageLocation"]; ?>" alt="<?= $row["ProductName"]; ?>">
                        <h3><?= $row["ProductName"]; ?></h3>
                        <p><?= $row["description"]; ?></p>
                        <h4 class="tags111"><?= $row["price"]; ?></h4>
                        <form action="productDetails.php" method="GET">
                            <input type="hidden" name="productlink" value="<?= $row["productCode"];?>">
                            <button type="submit" class="view-product">Learns More</button>
                        </form>
                        
                    </div>
                    <?php
                }
            } else {
                ?>
                <h1 class="no-product">No Product Found</h1>
                <?php
            }
        } catch (PDOException $error) {
            echo 'Database Error! Report Problem.<br>';
        }
        $database1->dbCloseConnection();
        ?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

</div>
</body>
</html>
