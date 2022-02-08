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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="CSS/cart.css">
    <title>Cart</title>
</head>
<body>

<?php 
    include("header.php");
    require_once "..\model\cart.php";
    $cart = new Cart;  
?>

    <div class="container">
        <div class="allproducts">
            <h1>Shopping cart</h1>
            <hr>

            <?php
                $cart->setSubTotal();
                $cart->addItemToCart();        
                $cart->removeCartItem();
                $cart->increaseAndDecrease();
            ?>
        </div>

        <div class="finish">
            <h2>
        <?php
            $total_products_in_cart = array_sum($_SESSION['items']);
            if(count($_SESSION['items']) == 1){
                echo "Subtotal: (".$total_products_in_cart. " item): <strong>$".$cart->getSubTotal()."</strong>";
            }elseif(count($_SESSION['items']) > 1){
                echo "Subtotal: (".$total_products_in_cart. " items): <strong>$".$cart->getSubTotal()."</strong>";
            }?>
        </h2>
            <input type="submit" onclick="checkout()" value="Proceed to checkout">
        </div>

    </div>

    <script>
        function checkout(){
            swal({
                title: "Are you sure?",
                text: "Do you really want to confirm the purchase of <?php echo $total_products_in_cart?> products that total <?php echo $cart->getSubTotal() ?> dollars?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34943B",
                confirmButtonText: "Yes, I do!",
                closeOnConfirm: false,
                html: false
            }, 
            function(){
                swal("Success!",
                "Your purchase has been successfully completed!",
                "success");

                setTimeout(function(){
                    location = "user_profile.php";
                    }, 2000);
            });
        }
    </script>
</body>
</html>