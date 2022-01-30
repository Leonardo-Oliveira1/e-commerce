<?php 

    require_once "connection.php";
    class productQueries extends Connection{
        public function registerProduct($name, $image, $description, $details,
        $author, $price, $category){
                
                $cmd = $this->pdo->prepare("INSERT INTO `products` (`product_id`,
                `product_name`, `product_image`, `product_description`,
                `product_details`, `product_author`, `product_seller`,
                `product_rating`, `product_price`, `product_category`, `seller_id`)  
                VALUES (NULL, :n, :i, :dc, :de, :a, :s, 0, :p, :c, :si)");

                $cmd->bindValue(":n", $name);
                $cmd->bindValue(":i", $image);
                $cmd->bindValue(":dc", $description);
                $cmd->bindValue(":de", $details);
                $cmd->bindValue(":a", $author);
                $cmd->bindValue(":s", $_SESSION['user_name']);
                $cmd->bindValue(":p", $price);
                $cmd->bindValue(":c", $category);
                $cmd->bindValue(":si", $_SESSION['id']);
                $cmd->execute();
                return true;
        }

        public function deleteProduct(){
             if(isset($_GET['delete'])){
                  $product_id_delete = $_GET['delete']; 
                  $cmd = $this->pdo->prepare("DELETE FROM `products` WHERE `products`.`product_id` = $product_id_delete"); 
                  $cmd->execute(); 
                }else{ 
                    return false; 
                } 
            }
            
        public function showProducts(){
            $selectall = $this->pdo->query("SELECT `product_id` FROM products");
            $selectall->execute();

            while($count = $selectall->fetch(PDO::FETCH_ASSOC)){
                $countposition = $count['product_id'];

                $cmd = $this->pdo->prepare("SELECT `product_image`, `product_name`,
                `product_author`, `product_rating`, `product_price`, `product_seller`
                FROM `products` WHERE `product_id` = :id");
                
                $cmd->bindValue(":id", $countposition);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
    
                $product_image_url = $result['product_image'];
                $product_name = $result['product_name'];
                $product_author = $result['product_author'];
                $product_rating = $result['product_rating'];
                $product_price = $result['product_price'];
                $product_seller = $result['product_seller'];
                
    
                echo "<div class='product'>
                <img src='view/product_images/{$product_image_url}' alt='Product image'>
        
                <div class='info'>
                    <span id='title'>{$product_name}</span><br>
                    <span id='author'>by {$product_author}</span>
                    <p id='rating'>{$product_rating} ratings</p>
                    <p id='price'> $ {$product_price}</p>
                    <p id='seller'>Announced by {$product_seller}</p>
                </div>
        
                <button>Add to Cart</button>
            </div>";
            }

        }

        public function showUserProducts(){
            $seller_id = $_SESSION['id'];
            $selectAllUserProducts = $this->pdo->query("SELECT `product_id` FROM `products` WHERE `seller_id` = $seller_id");
            $selectAllUserProducts->execute();

            while($count = $selectAllUserProducts->fetch(PDO::FETCH_ASSOC)){
                $countposition = $count['product_id'];
                $cmd = $this->pdo->prepare("SELECT `product_image`, `product_name`,
                `product_author`, `product_rating`, `product_price`, `product_seller`
                FROM `products` WHERE `seller_id` = :s_id and `product_id` = :p_id");
                
                $cmd->bindValue(":s_id", $seller_id);
                $cmd->bindValue(":p_id", $countposition);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
    
                $product_image_url = $result['product_image'];
                $product_name = $result['product_name'];
                $product_author = $result['product_author'];
                $product_rating = $result['product_rating'];
                $product_price = $result['product_price'];
                $product_seller = $result['product_seller'];

                echo "<div class='product'>
                <img src='product_images/{$product_image_url}' alt='Product image'>
        
                <div class='info'>
                    <span id='title'>{$product_name}</span><br>
                    <span id='author'>by {$product_author}</span>
                    <p id='rating'>{$product_rating} ratings</p>
                    <p id='price'> $ {$product_price}</p>
                    <p id='seller'>Announced by {$product_seller}</p>
                </div>
        
                    <button>See product</button>
                </div>";
            }
        }

        public function beSeller(){
            $user_id = $_SESSION['id'];
            $cmd = $this->pdo->query("UPDATE users SET isSeller = 1 WHERE id = $user_id");
            $cmd->execute();

        }
    }
?>