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
        
        if(!isset($_SESSION['itens'])){
            $_SESSION['itens'] = array();
        }
        
        if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
            //adiciona ao carrinho
            $idProduto = $_GET['id'];
            if(!isset($_SESSION['itens'][$idProduto])){
                $_SESSION['itens'][$idProduto] = 1;
            }else{
                $_SESSION['itens'][$idProduto] +=  1;
            }
        }

        //Exibe o carrinho
        if(count($_SESSION['itens']) == 0){
            echo "Carrinho Vazio.";
        }else{
            foreach ($_SESSION['itens'] as $idProduto => $quantidade){
                $cart->show($idProduto);
                $_SESSION['cart_product_amount'] = count($_SESSION['itens']);
            }
        }
        

    ?>
</body>
</html>