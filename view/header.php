<head><link rel="stylesheet" href="CSS/header.css"></head>
<header>
    <nav>
        <div class="logozipcode">
            <a href="../index.php" id="logo">LOGO</a>
            <p id="zipcode"> 
                <?php 
                    if(isset($_SESSION['user_name'])){
                        echo "Delievery to "."<strong>".$_SESSION['user_name']."</strong>";
                    }
                ?>

                <br> 
                        
                <?php 
                    if(isset($_SESSION['user_zipcode'])){
                        echo "Zipcode: "."<strong>".$_SESSION['user_zipcode']."</strong>";
                    }
                ?>
            </p>
        </div>
        <input type="text" id="txtBusca" placeholder="Search products..."/>

        <ul>
            <a href="register_product.php"><li>Add a new product</li></a>
            <a href="<?php if(isset($_SESSION['Logged'])){ echo "user_profile.php";}else{ echo "login_user.php";}?>"><li>Your account</li></a>
            <a href="cart.php"><li>Cart (<?php if(isset($_SESSION['cart_product_amount'])){echo $_SESSION['cart_product_amount'];}else{echo 0;}?>)</li></a>
        </ul>
    </nav>
</header>