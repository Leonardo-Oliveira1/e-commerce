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
        require_once "..\model\cart.php";
        $cart = new Cart;
        
    ?>


<?php ?>

    <div class="container">
        <div class="allproducts">
            <h1>Shopping cart</h1>
            <hr>

        <?php
                $cart->setSubTotal();
                $cart->addItemToCart();        
                $cart->removeCartItem();
            ?>
        </div>

        <div class="finish">
            <h2><?php
     if(count($_SESSION['items']) == 1){
     echo "Subtotal: (".count($_SESSION['items']). " item): <strong>$".$cart->getSubTotal()."</strong>";
    }elseif(count($_SESSION['items']) > 1){
        echo "Subtotal: (".count($_SESSION['items']). " items): <strong>$".$cart->getSubTotal()."</strong>";
    }
     ?></h2>
            <input type="submit" value="Proceed to checkout">
        </div>

    </div>


</body>
</html>