
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login and Register </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center" style="margin-top:30px;">Login and Register</h1>
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <?php 
                if(isset($_SESSION['error'])){
                    echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
                        </div>
                    ";
  
                    //unset error
                    unset($_SESSION['error']);
                }
  
                if(isset($_SESSION['success'])){
                    echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
                        </div>
                    ";
  
                    //unset success
                    unset($_SESSION['success']);
                }
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign in your account</h5>
                    <hr>
                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>" placeholder="input email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>" placeholder="input password" required>
                        </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                        <a href="register_form.php">Register a new account</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>