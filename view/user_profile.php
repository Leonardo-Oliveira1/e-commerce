<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>👩‍💻</text></svg>">
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <title><?php echo "{$_SESSION['user_name']} profile's"?></title>
</head>
<body>
    <?php 
        include("../controller/user_logged_verification.php");
        require_once "..\model\product_classes\showEditableProducts.php";
        $products = new showEditableProducts;
        include("header.php");

        if(isset($_GET['deleteID'])){
            header("Location: user_profile.php");
        }

        if(isset($_GET['product_id_to_update'])){
            $_SESSION['updateProductID'] = $_GET['product_id_to_update'];
            header("Location: update_product.php");
        }
    ?>

    <div class="content">
        

        <h1>Welcome back, <?php echo $_SESSION['user_name'];?>!</h1>
        <?php include("../controller/isSeller_verification.php");?>
        
        <div class="logoutdiv">
            <a href="?logout=1"><button id="logout">Logout</button></a>
            <?php include("../controller/logout_verification.php");?>
        </div>

        <br>
        <br>
        <br>
        <h1>Your products</h1>
        <br>
        <hr>
        <br>
        
        <div class="allproducts">
            <?php $products->show(); $products->deleteProduct();?>
        </div>

    </div>
    
    <script>
        function deleteAnimation(){
            swal({
                title: "Are you sure?",
                text: "You are about to delete this product and it can never be recovered again.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                html: false
            }, function(){
                setTimeout(function(){
                    location = "?deleteID=<?php echo $_GET['product_id_to_delete']; ?>";
                    }, 1500);
                swal("Deleted!",
                "This product has been successfully deleted!",
                "success");

            });
        }
    </script>

<?php
    if (isset($_GET['product_id_to_delete'])){
        echo "<script>deleteAnimation();</script>";
    }
?>
</body>
</html>