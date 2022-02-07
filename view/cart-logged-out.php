<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>🛒</text></svg>">
    <link rel="stylesheet" href="CSS/cart.css">
    <title>Cart</title>
</head>
<body>
    <?php 
        include("header.php");  
    ?>

<style>
body {
  background-image: url("CSS/plant-image.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 15%;

}
</style>
    <div class="container-empty">
            <h1>Your cart is empty. Sign in or sign up and start to shopping!</h1>

            <div class="actions">
                <a href="login_user.php"><button style="background-color: #7D5BE1;">Sign in to your account</button></a>
                <a href="register_user.php"><button>Sign up now</button></a>
            </div>
    </div>

</body>
</html>