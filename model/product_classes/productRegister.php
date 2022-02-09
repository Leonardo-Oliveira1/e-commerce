<?php 

    require_once "..\model\connection.php";
    class productRegister extends Connection{
        
        public function register($name, $image, $description,
        $author, $price, $category){
                
            $username = $_SESSION['user_name'];
            $seller_id = $_SESSION['id'];

            $cmd = $this->pdo->prepare("INSERT INTO `products` (
            `product_id`,
            `product_name`,
            `product_image`,
            `product_description`,
            `product_author`,
            `product_seller`,
            `product_rating`,
            `product_price`,
            `product_category`,
            `seller_id`)  
            VALUES (NULL, '$name', '$image', '$description', '$author',
            '$username', 0, '$price', '$category', '$seller_id')");

            $cmd->execute();
            header("Location: ../index.php");
            return true;
        }    
    }




?>