<?php 

    require_once "connection.php";
    class Cart extends Connection{

        public function show($idProduto){
            $product_id = $idProduto;
            $cmd = $this->pdo->prepare("SELECT `product_image`, `product_name`,
            `product_author`, `product_rating`, `product_price`, `product_seller`
            FROM `products` WHERE `product_id` = $product_id");
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

            <a href='?remove=cart&id=$product_id'>Delete</a>
            <p>Qty: {$_SESSION['items'][$product_id]}</p>
            </div>";

        }

        public function addItemToCart(){
            if(!isset($_SESSION['items'])){
                $_SESSION['items'] = array();
            }
            
            if(isset($_GET['add']) && $_GET['add'] == "cart"){
                //adiciona ao carrinho
                $idProduct = $_GET['id'];
                if(!isset($_SESSION['items'][$idProduct])){
                    $_SESSION['items'][$idProduct] = 1;
                }else{
                    $_SESSION['items'][$idProduct] +=  1;
                }
            }
    
            //Exibe o carrinho
            if(count($_SESSION['items']) == 0){
                echo "The cart is empty.";
            }else{
                foreach ($_SESSION['items'] as $idProduct => $amount){
                    $this->show($idProduct);
                    $_SESSION['cart_product_amount'] = count($_SESSION['items']);
                }
            }
        }

        public function removeCartItem(){
            if(isset($_GET['remove']) && $_GET['remove'] == "cart"){
                $idProduct = $_GET['id'];
                unset($_SESSION['items'][$idProduct]);
                header("Refresh:0; url=../view/cart.php");
            }
        }
    }   

?>