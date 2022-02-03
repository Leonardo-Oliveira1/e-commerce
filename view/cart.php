<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>Cart</title>
</head>
<body>
    <?php 
        include("header.php");
        require_once "..\model\cart.php";
        $cart = new Cart;
        
        $cart->addItemToCart();        
        $cart->removeCartItem();
    ?>
</body>
</html>