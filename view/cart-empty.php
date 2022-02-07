<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1 style="margin-top: 40px;">Your cart is empty. Start to shopping in our store!</h1>
            <h2><a href="/e-commerce/index.php">Check all products</a></h2>
    </div>

</body>
</html>