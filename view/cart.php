<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "..\model\user_queries.php";
        $user_query = new userQueries;

        include("header.php");

    ?>
        
        <h1>Cart!</h1>
</body>
</html>