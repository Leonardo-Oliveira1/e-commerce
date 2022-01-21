<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/CSS/header.css">
    <link rel="stylesheet" href="public/CSS/product.css">
    <title>Document</title>
</head>
<body>

<header>
        <nav>
            <div class="logozipcode">
                <a href="index.php" id="logo">LOGO</a>
                <p id="zipcode">Delievery to <strong>{user}</strong> <br> Zipcode: <strong>{cep}</strong></p>
            </div>
            <input type="text" id="txtBusca" placeholder="Search products..."/>

            <ul>
                <a href="view/register_product.php"><li>Launch products</li></a>
                <a href="view/product_management.php"><li>Your Account</li></a>
                <a href="view/cart.php"><li>Cart (0)</li></a>
            </ul>
        </nav>
</header>
    <h1>HOME</h1>
    <div class="allproducts">
    <?php 
        require "controller/product_queries.php";
        $product_query = new productQueries;
        $product_query->showProducts();
    ?>   
    </div>
</body>
</html>