<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Launch product</title>
    <link rel="stylesheet" href="CSS/forms/form_launch_product.css">
</head>
<body>
    <?php 
    include("header.php");
    ?>
<div class="container">
    <div class="message">
        <h1>Launch a product</h1>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <label>Product name</label><br>
        <input type="text" id="product_name" required name="product_name" maxlength="60"><br><br>

        <label>Product description</label><br>
        <textarea id="product_description" required name="product_description"></textarea><br>

        <label>Product details</label><br>
        <textarea id="product_details" required name="product_details"></textarea><br>

        <label>Product author</label><br>
        <input type="text" id="product_author" required name="product_author" maxlength="16"><br><br>

        <label>Product seller</label><br>
        <input type="text" id="product_seller" required name="product_seller" maxlength="16"><br><br>

        <label>Product price (in dollars)</label><br>
        <label style="color: red; font-size: 1.2rem">don't use letters.</label>
        <input type="text" id="product_price" required name="product_price" maxlength="8"><br><br>

        <label>Product category</label><br>
            <select required name="product_category">
                <option value="" selected>--Choose a category--</option>
                <option value="Accessories">Accessories</option>
                <option value="Movies & Television">Movies & Television</option>
                <option value="Books">Books</option>
                <option value="Video Games">Video Games</option>
                <option value="Eletronics">Eletronics</option>
            </select><br><br>
                
            
        <label>Product image</label><br>
        <input type="file" id="product_image" required name="product_image"><br><br>
    <?php 
        require_once "..\model\product_queries.php";
        $product_query = new productQueries;

        if(isset($_POST['send_product'])){
            $name = addslashes($_POST['product_name']);
            $description = addslashes($_POST['product_description']);
            $details = addslashes($_POST['product_details']);
            $author = addslashes($_POST['product_author']);
            $seller = addslashes($_POST['product_seller']);
            $price = addslashes($_POST['product_price']);
            $category = addslashes($_POST['product_category']);

            include("..\controller\product_image_validation.php");

            if(!empty($name) && !empty($image) && !empty($description) && !empty($details) && !empty($author) && !empty($seller) && !empty($price) && !empty($category)){
                $product_query->registerProduct($name, $image, $description, $details, $author, $seller, $price, $category);
            }
        }
    ?>
        <input type="submit" value="Create Product" name="send_product">  
        </form> 
    </div>
    <a href="index.html">Home</a>
</body>
</html>