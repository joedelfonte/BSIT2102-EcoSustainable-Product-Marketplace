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
            
            <?php  if(isset($_get['error'])) { ?>
                <p class="error"> <?php echo $_get['error']; ?></p>
                <?php } ?>
      
            <labe>User name</labe>
            <input type="text" name="username" placeholder="User name"><br>
            <label>Password</label>
            <input type="text" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
     </form>
    </div>
</body>
</html>

