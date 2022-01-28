<?php 

    require_once "connection.php";
    class userQueries extends Connection{
        private $userID;


        public function registerUser($name, $email, $password, $address,
        $zipcode, $isSeller){
    
            //verify if already exists any email similar registered
            $cmd = $this->pdo->prepare("SELECT id FROM users WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();
        
            if($cmd->rowCount() > 0){ //email already exists
                return false;
            }else{ //email not found
                $cmd = $this->pdo->prepare("INSERT INTO users 
                (name, email, password, address, zipcode, isSeller) 
                VALUES (:n, :e, :p, :a, :z, :i)");

                $cmd->bindValue(":n", $name);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":p", $password);
                $cmd->bindValue(":a", $address);
                $cmd->bindValue(":z", $zipcode);
                $cmd->bindValue(":i", $isSeller);
                $cmd->execute();
                header("Location: ../index.php");
                return true;
            }
        }

        public function loginUser($email, $password){
            $cmd = $this->pdo->prepare("SELECT id FROM users WHERE 
            email = :e and `password` = :p");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":p", $password);
            $cmd->execute();
            $user_id_array = $cmd->fetch(PDO::FETCH_ASSOC);
            
            if ($user_id_array != false){
                $user_id = $user_id_array;
                echo '<label style="color: green">You has been logged! </label>';
                $this->userID = $user_id_array['id']; 
                $this->createUserSession();
                header("Location: user_profile.php");
            }else{
                echo '<label style="color: red">The email or password is wrong!</label>';
            }
            
        }

        public function getUserID(){
            return $this->userID;
        }

        public function createUserSession(){
            $select = $this->pdo->prepare("SELECT * FROM users WHERE id = :i");
            $select->bindValue(":i", $this->getUserID());
            $select->execute();

            $result = $select->fetch(PDO::FETCH_ASSOC);

            $user_name = $result['name'];
            $user_zipcode = $result['zipcode'];
            $user_isSeller = $result['isSeller'];
            $user_id = $result['id'];
                
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_zipcode'] = $user_zipcode;
            $_SESSION['isSeller'] = $user_isSeller;
            $_SESSION['id'] = $user_id;
            $_SESSION['Logged'] = true;
        }

        public function beSeller(){
            $user_id = $_SESSION['id'];
            $cmd = $this->pdo->prepare("UPDATE `users` SET `isSeller`='1' WHERE `id` = $user_id"); 
            $cmd->bindValue(":i", $this->userID);
            $cmd->execute();

            $_SESSION['isSeller'] = 1;
            header("Refresh:0; url=user_profile.php");
        }

    }
?>