<?php 

    require_once "..\model\connection.php";
    class productCRUD extends Connection{
        
        public function register($name, $image, $description,
        $author, $price, $category){
                
            $cmd = $this->pdo->prepare("INSERT INTO `products` (`product_id`,
            `product_name`, `product_image`, `product_description`, `product_author`, `product_seller`,
            `product_rating`, `product_price`, `product_category`, `seller_id`)  
            VALUES (NULL, :n, :i, :dc, :a, :s, 0, :p, :c, :si)");

            $cmd->bindValue(":n", $name);
            $cmd->bindValue(":i", $image);
            $cmd->bindValue(":dc", $description);
            $cmd->bindValue(":a", $author);
            $cmd->bindValue(":s", $_SESSION['user_name']);
            $cmd->bindValue(":p", $price);
            $cmd->bindValue(":c", $category);
            $cmd->bindValue(":si", $_SESSION['id']);
            $cmd->execute();
            header("Location: ../index.php");
            return true;
        }    
    }




?>