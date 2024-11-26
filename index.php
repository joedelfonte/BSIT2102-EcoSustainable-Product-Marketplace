<?php
$file = 'src/process/cookieForm.php';
if (file_exists($file)) {
    require $file;
} else {
    error_log("The file '$file' does not exist. (".__FILE__ .")");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icons/eco-banner.png" type="image/x-icon">
    <!-- local css -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Eco-MarketPlace</title>
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
                        <img src="assets/icons/eco-logo.png" alt="Eco-Marketplace-Logo" class="logo">
                        <span class="fs-4">Eco-MarketPlace</span>
                    </a>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search" action="../public/products/search.php" method="GET">
                <input type="search" class="form-control" name="search" id="Search" placeholder="Search Product" aria-label="Search">
            </form>
                    </div>
                </header>
            </div>

    </header>    

    <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/eco-image2.jpg" alt="" class="image-1">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Eco-Market</h1>
                    <p class="opacity-75 descript">SDG - 12: Responsible Consumption and Production.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                </div>
                </div>
            </div>
    </div>  




</body>
</html>