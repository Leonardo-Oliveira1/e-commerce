<?php 

    require_once "connection.php";
    class Cart extends Connection{

        private $subTotal;

        public function setSubTotal(){
            $this->subTotal = 0;
        }

        public function getSubTotal(){
            return number_format($this->subTotal, 2, ',', '.');
        }


        public function show($product_id){
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


            $product_price = number_format($product_price, 2, ',', '.');

            echo "<div class='product'>
            <img src='product_images/{$product_image_url}' alt='Product image'>

            <div class='info'>
                <span id='title'>{$product_name}</span><br>
                <span id='author'>by {$product_author}</span>
                <p id='seller'>Announced by {$product_seller}</p>
                <p id='price'> $ {$product_price}</p>
            </div>

            <div class='amount'>
                <label>Qnty.</label>
                <input type='number' name='qnty' min='1' max='10' maxlength='2' value='{$_SESSION['items'][$product_id]}' id='qnty'>
                <a href='?remove=cart&id=$product_id'>Delete</a>
            </div>
            </div>
            
            <hr>

            ";


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
                    header("Location: cart.php");
                }else{
                    $_SESSION['items'][$idProduct] +=  1;
                    header("Location: cart.php");
                }
            }
    
            //Show cart
            if(count($_SESSION['items']) == 0 && !$_SESSION['Logged']){
                header("Location: cart-logged-out.php");
            }
            if(count($_SESSION['items']) == 0 && $_SESSION['Logged']){
                header("Location: cart-empty.php");
            }else{
                foreach ($_SESSION['items'] as $idProduct => $amount){
                    $this->show($idProduct);
                    $_SESSION['cart_product_amount'] = count($_SESSION['items']);
                    
                    //getting id
                    $this->subTotal($idProduct);
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

        public function subTotal($product_id){
            $cmd = $this->pdo->prepare("SELECT `product_price` 
            FROM `products` WHERE `product_id` = $product_id");
            $cmd->execute();
            $result = $cmd->fetch(PDO::FETCH_ASSOC);
            
            $product_price = $result['product_price'];
            $qnty = $_SESSION['items'][$product_id];

            foreach ($result as $key) {
                $this->subTotal += $product_price * $qnty;
            }
        }
    }   

?>