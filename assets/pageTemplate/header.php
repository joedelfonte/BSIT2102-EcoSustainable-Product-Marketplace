<?php 
require_once realpath(dirname(__FILE__) . '/../../config.php');
// require_once (ROOT_PATH .'\src\database\database.php');
// require_once (ROOT_PATH .'\src\users\userCrud.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-Market</title>
    <link rel="icon" href="/currdir/BSIT2102_EcoSustainable_Product_Marketplace/assets/icons/eco-logo.png" alt="Eco-Marketplace-Logo" type="image/x-icon">

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Load For Global Css -->
    <link rel="stylesheet" href="/currdir/BSIT2102_EcoSustainable_Product_Marketplace/assets/css/style.css">
    <link rel="stylesheet" href="/currdir/BSIT2102_EcoSustainable_Product_Marketplace//assets/css/search.css">
    
    <!--J query -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Search Script -->
    <script>
        // const ROOT_URL = "<?= ROOT_PATH ?>";
        // console.log(ROOT_URL);
        function sanitizeInput(input) {
        var element = document.createElement('div');
        element.innerText = input;
        return element.innerHTML;
        }

        $(document).ready(function() {
            $('#Search').on('input', function() {
                let keyword = $(this).val();
                keyword = sanitizeInput(keyword);
                if (keyword.length > 0) {
                    $.ajax({
                        type: 'POST',
                        url: '/currdir/BSIT2102_EcoSustainable_Product_Marketplace/assets/pageTemplate/searchHandler.php',
                        data: { 
                            liveSearch: keyword 
                        },
                        success: function(response) {
                            $('#search-results').html(response).show();
                        },
                        error: function(xhr, status, error) { 
                            console.error('Failed to Fetch Data: ' + error); 
                        }
                    });
                } else {
                    $('#search-results').hide().empty();
                }
            });

            $(document).on('click', '.result-item', function() {
                const selectedResult = $(this).text();
                $('#search').val(selectedResult);
                $('#search-results').hide().empty();
            });

            
        });

    </script>
</head>
<body>
    <header>
        <nav class="py-2 border-bottom header-tops">
            <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
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
                            <img src="/currdir/BSIT2102_EcoSustainable_Product_Marketplace/assets/icons/eco-logo.png" alt="Eco-Marketplace-Logo" class="logo">
                            <span class="fs-4">Eco-MarketPlace</span>
                        </a>
                        <div class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                            <form action="/currdir/BSIT2102_EcoSustainable_Product_Marketplace/src\products\libraryProduct.php">
                            <input type="search" class="form-control" name="search" id="Search" placeholder="Search Product" aria-label="Search">
                            </form>
                            <div id="search-results" class="">
                            </div>
                        </div>
                    </div>
                </header>
            </div>

    </header>