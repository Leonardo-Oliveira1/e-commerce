<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/CSS/header.css">
    <link rel="stylesheet" href="view/CSS/product.css">
    <title>Document</title>
</head>
<body>

<header>
        <nav>
            <div class="logozipcode">
                <a href="index.php" id="logo">LOGO</a>
                <p id="zipcode">Delievery to <strong><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];}?></strong> <br> Zipcode: <strong><?php if(isset($_SESSION['user_zipcode'])){ echo $_SESSION['user_zipcode'];}?></strong></p>
            </div>
            <input type="text" id="txtBusca" placeholder="Search products..."/>

            <ul>
                <a href="view/register_product.php"><li>Manage Products</li></a>
                <a href="view/register_user.php"><li>Your account</li></a>
                <a href="view/cart.php"><li>Cart (0)</li></a>
            </ul>
        </nav>
</header>
    <div class="allproducts">
    <?php 
        require "model/product_queries.php";
        $product_query = new productQueries;
        $product_query->showProducts();
    ?>   
    </div>
</body>
</html>