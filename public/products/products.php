<!-- For Showing All Products -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../styles/style.css">
    
</head>
<body>
    <h1>Eco Products</h1>
    <div class="container">
        <h2>List Of Products</h2>
        
        <div class="product-list">
            <?php
            require_once ('../database.php');
            
            try {
                $database1 = new Connection;
              //  $database1->dbConnect();
                $result = $database1->show('products');
                
                if($result){
                    foreach($result as $row){
                        ?>  
                        <!-- <div class="product"> -->
                            <img src="<?= $row["productImageLocation"];?>" alt="<?= $row["ProductName"];?>">
                            <h3><?= $row["ProductName"]; ?></h3>
                            <?= $row["description"];?>
                            <h4><?= $row["price"];  ?></h4>
                        </div>    
                        <?php
                    }
                } else {
                    ?>
                    <h1>No Product Found</h1>
                    <?php
                } 
            } catch (PDOException $error){
                echo 'Database Error! Report Problem.' ."<br>";
               // echo "Error executing query: " . $error->getMessage();
            }
           $database1->dbCloseConnection();
            
            ?>
            

        </div>
        
        
    </div>

</body>
</html>