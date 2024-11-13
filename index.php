<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   //for login
    <div class="container">
        <form action="login.php" method="post">
            <h2>Login</h2>
      
            <labe>User name</labe>
            <input type="text" name="username" placeholder="User name"><br>
            <label>Password</label>
            <input type="text" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
     </form>
    </div>
</body>
</html>


<?php
echo 'Project Title : Eco and Sustainable Product Marketplace' ."<br>";
echo 'Leader : Ralph Joedel Fonte' ."<br>";
echo 'Members :  Roice Panes, Arron Catapang' ."<br>";

   //connecting postgres database using ODBC
   $dsn = "Driver={PostgreSQL UNICODE};Server=localhost;Port=5432;Database=postgres;";
   $usr = 'postgres';
   $dbpass = '0907';
   $conn = odbc_connect($dsn, $usr, $dbpass);
   if (!$conn) {
       die("Connection failed: " . odbc_errormsg());
   } else {
       echo "Connection Successful!" ."<br>";
   }

   $query = "SELECT * FROM information_schema.tables WHERE table_schema = 'public'";
   $result = odbc_exec($conn, $query);

  if ($result > 0){
    echo var_dump($result) ."<br>";
    while ($row = odbc_fetch_array($result)) { echo 'Table: ' . $row['table_name'] . '<br>'; }
  } else {echo 'No Table In Database';};

  
?>
