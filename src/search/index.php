<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Searching Product</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-11">
                    <div class="card-header">
                        <h4>Search Product </h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <div class="card mt-11">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Store ID</th>
                                    <th>Category</th>
                                    <th>Status ID</th>
                                    <th>Image Location</th>
                                    <th>Data Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $conn = mysqli_connect("localhost","root","","searchingproduct");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM product WHERE CONCAT(productName,productCode,description,price,quantity,storeId,categoryId,statusId,imageLocation,dateCreated) LIKE '%$filtervalues%' ";

                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['productName']; ?></td>
                                                    <td><?= $items['productCode']; ?></td>
                                                    <td><?= $items['description']; ?></td>
                                                    <td><?= $items['price']; ?></td>
                                                    <td><?= $items['quantity']; ?></td>
                                                    <td><?= $items['storeId']; ?></td>
                                                    <td><?= $items['categoryId']; ?></td>
                                                    <td><?= $items['statusId']; ?></td>
                                                    <td><?= $items['imageLocation']; ?></td>
                                                    <td><?= $items['dateCreated']; ?></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>

                                                <tr>
                                                    <td colspan="11">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- 
    < script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>