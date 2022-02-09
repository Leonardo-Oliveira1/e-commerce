<?php 

    require_once "..\model\connection.php";
    class userLogin extends Connection{
        
        private $userID;

        public function getUserID(){
            return $this->userID;
        }

        public function loginUser($email, $password){
            $cmd = $this->pdo->prepare("SELECT id FROM users WHERE 
            email = '$email' and `password` = '$password'");
            $cmd->execute();
            $user_id_array = $cmd->fetch(PDO::FETCH_ASSOC);
            
            if ($user_id_array != false){
                $this->userID = $user_id_array['id']; 
                $this->createUserSession();
                echo '<label style="color: green">You has been logged! </label>';
                header("Location: user_profile.php");
            }else{
                echo '<label style="color: red">The email or password is wrong!</label>';
            }
            
        }

        public function createUserSession(){
            $select = $this->pdo->prepare("SELECT * FROM users WHERE id = :i");
            $select->bindValue(":i", $this->getUserID());
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC);

            $_SESSION['user_name'] = $result['name'];
            $_SESSION['user_zipcode'] = $result['zipcode'];
            $_SESSION['isSeller'] = $result['isSeller'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['Logged'] = true;
        }
    }
?>