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