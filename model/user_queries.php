<?php 

    require_once "connection.php";
    class userQueries extends Connection{
        public function registerUser($name, $email, $password, $address, $zipcode, $isSeller){
    
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
            $cmd = $this->pdo->prepare("SELECT id FROM users WHERE email = :e and `password` = :p");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":p", $password);
            $cmd->execute();
            $user_id_array = $cmd->fetch(PDO::FETCH_ASSOC);

            
            if ($user_id_array != false){
                $user_id = $user_id_array;
                echo '<label style="color: green">You has been logged! </label>';

                header("Location: cart.php");
            }else{
                echo '<label style="color: red">The email or password is wrong! </label>';
            }

        }
        
        public function userSession(){
            echo $_SESSION['teste'];
            $user_id = $user_id_array;
            $select = $this->pdo->prepare("SELECT * FROM users WHERE id = :i");
            $select->bindValue(":i", $user_id);
            $select->execute();

            $result = $select->fetch(PDO::FETCH_ASSOC);
            $user_name = $result['name'];
            $user_zipcode = $result['zipcode'];
            $user_isSeller = $result['isSeller'];

            echo $user_name;
            echo $user_zipcode;
            echo $user_isSeller;
        }

    }
?>