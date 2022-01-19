<?php 

    require_once "..\model\connection.php";
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
                return true;
            }
        }
    }
?>