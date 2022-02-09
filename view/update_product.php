<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>⚙️</text></svg>">
    <link rel="stylesheet" href="CSS/forms/form_launch_product.css">
</head>
<body>
    <?php  
        require_once "..\model\product_classes\showEditableProducts.php";
        $update = new showEditableProducts;

        include("header.php");
        include("../controller/user_logged_verification.php");
        if(!$_SESSION['isSeller']) die('<center><h1>You must be a seller to launch products. Become a seller on your profile!</h1></center>');
    ?>

    <div class="container">
        <div class="message">
            <h1>Update a product</h1>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <?php $update->getData();?>
                    
                
        <?php 
            if(isset($_POST['send_product'])){
                $name = addslashes($_POST['product_name']);
                $description = addslashes($_POST['product_description']);
                $author = addslashes($_POST['product_author']);
                $price = addslashes($_POST['product_price']);
                $category = addslashes($_POST['product_category']);

                if(!empty($name) && !empty($description) 
                && !empty($author) && !empty($price)){
                    $update->updateProduct($name, $description, 
                    $author, $price);
                }
            }
        ?>
            
            <input type="submit"value="Update Product" name="send_product">  
            </form> 
        </div>
        <a href="index.html">Home</a>
</body>
</html>