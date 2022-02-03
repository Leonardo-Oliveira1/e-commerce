<?php 
    if(empty($_SESSION['user_name']) && empty($_SESSION['user_zipcode']) && empty($_SESSION['isSeller'])){
        $_SESSION['Logged'] = false; 
    }
    if(!$_SESSION['Logged']) die(header("Location: login_user.php"));
?>