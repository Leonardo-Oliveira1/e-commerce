<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <title><?php echo "{$_SESSION['user_name']} profile's"?></title>
</head>
<body>
    <?php 
        require "..\model\product_queries.php";
        require_once "..\model\user_queries.php";
        $user_query = new userQueries;
        $product_query = new productQueries;
        include("header.php");
    ?>

    <div class="content">
        
        <?php 
            if(empty($_SESSION['user_name']) && empty($_SESSION['user_zipcode']) && empty($_SESSION['isSeller'])){
                $_SESSION['Logged'] = false; 
            }
            if(!$_SESSION['Logged']) die(header("Location: login_user.php"));
        ?>

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
            <?php $product_query->showUserProducts(); ?>
        </div>

    </div>
</body>
</html>