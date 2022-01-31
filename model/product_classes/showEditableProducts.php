<?php 
    require_once "..\model\connection.php";
    class showEditableProducts extends Connection{
    
        public function show(){
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
    }



?>