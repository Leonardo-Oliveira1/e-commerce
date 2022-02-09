<?php 
    require_once "..\model\connection.php";
    class showEditableProducts extends Connection{
    
        private $product_id_position;

        public function getProductIdPosition(){
            return $this->product_id_position;
        }
    
    
            public function show(){
            $seller_id = $_SESSION['id'];
            $selectAllUserProducts = $this->pdo->query("SELECT `product_id` FROM `products` WHERE `seller_id` = $seller_id");
            $selectAllUserProducts->execute();
            
            while($count = $selectAllUserProducts->fetch(PDO::FETCH_ASSOC)){
                $product_id_position = $count['product_id'];
                $this->product_id_position = $product_id_position;
                
                $cmd = $this->pdo->prepare("SELECT `product_image`, `product_name`,
                `product_author`, `product_rating`, `product_price`, `product_seller`
                FROM `products` WHERE `seller_id` = :s_id and `product_id` = :p_id");
                
                $cmd->bindValue(":s_id", $seller_id);
                $cmd->bindValue(":p_id", $this->product_id_position);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
    
                $product_image_url = $result['product_image'];
                $product_name = $result['product_name'];
                $product_author = $result['product_author'];
                $product_rating = $result['product_rating'];
                $product_price = $result['product_price'];
                $product_seller = $result['product_seller'];
                
                $product_price = number_format($product_price, 2, ',', '.');
                
                echo "<div class='product'>
                <img src='product_images/{$product_image_url}' alt='Product image'>
        
                <div class='info'>
                    <span id='title'>{$product_name}</span><br>
                    <span id='author'>by {$product_author}</span>
                    <p id='rating'>{$product_rating} ratings</p>
                    <p id='price'> $ {$product_price}</p>
                    <p id='seller'>Announced by {$product_seller}</p>
                </div>
        
                <div class='actions'>
                    <button id='seeproduct'>See product</button></a>

                    <form action='?product_id_to_update=$product_id_position' method='post'>
                        <button id='change'><img src='CSS/imgs/pencil.svg' alt='Change Product'></button>
                    </form>

                    <form action='?product_id_to_delete=$product_id_position' method='post'>
                        <button id='delete'><img src='CSS/imgs/trash.svg' alt='Delete Product'></button>
                    </form>
                </div>
                </div>";
                    
                }
            }

            public function deleteProduct(){
                if(isset($_GET['deleteID'])){
                     $product_id_delete = $_GET['deleteID']; 
                     $cmd = $this->pdo->prepare("DELETE FROM `products` WHERE `products`.`product_id` = $product_id_delete"); 
                     $cmd->execute(); 
                   }else{ 
                       return false; 
                   } 
            }

            public function updateProduct(){
                if(isset($_GET['updateID'])){
                    $product_id_delete = $_GET['updateID']; 
                  }else{ 
                      return false; 
                  } 
            }
        }       



?>