<?php 

    require_once "..\model\connection.php";
    class userBeSeller extends Connection{
        
        public function turnUserSeller(){
            $user_id = $_SESSION['id'];
            $cmd = $this->pdo->prepare("UPDATE `users` SET `isSeller`='1' WHERE `id` = $user_id"); 
            $cmd->execute();

            $_SESSION['isSeller'] = 1;
        
            header("Refresh:0; url=user_profile.php");
        }
    }

?>