<?php 

    require "..\model\user_classes\userBeSeller.php";
    $beSeller = new userBeSeller;

    if($_SESSION['isSeller'] == 0){
        echo "<h2>You have a regular account. If you want to sell something, be a seller!</h2>";
        echo "<br>";
        echo "<br>";
                
        echo "<a href='?beSeller=1' style='font-size: 2.6rem; text-decoration: none;'>Be a seller</a>";
                
        if(isset($_GET['beSeller']) && $_GET['beSeller'] == 1){
            $beSeller->turnUserSeller();
        }
    }else{
        echo "<h2>It’s a pleasure to have you as a seller in our store.</h2>";
    }    
?>