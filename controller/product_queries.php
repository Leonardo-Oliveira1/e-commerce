<?php 

    require_once "..\model\connection.php";
    class productQueries extends Connection{
        public function registerProduct($name, $image, $description, $details, $author, $seller, $price, $category){
                
                $cmd = $this->pdo->prepare("INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_details`, `product_author`, `product_seller`, `product_rating`, `product_price`, `product_category`)  
                VALUES (NULL, :n, :i, :dc, :de, :a, :s, 0, :p, :c)");

                $cmd->bindValue(":n", $name);
                $cmd->bindValue(":i", $image);
                $cmd->bindValue(":dc", $description);
                $cmd->bindValue(":de", $details);
                $cmd->bindValue(":a", $author);
                $cmd->bindValue(":s", $seller);
                $cmd->bindValue(":p", $price);
                $cmd->bindValue(":c", $category);
                $cmd->execute();
                return true;
        }
    }
?>