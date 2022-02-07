<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>🏁</text></svg>">
    <link rel="stylesheet" href="CSS/forms/form_register_user.css">
</head>
<body>
    <?php 
        require_once "..\model\user_classes\userRegister.php";
        $register = new userRegister;
    ?>

    <div class="container">
        <div class="message">
            <h1>Create Account</h1>
        </div>

        <form method="POST">
            <label>First name</label><br>
            <input type="text" id="user_name" required name="user_name" maxlength="18"><br><br>
                
            <label>Email</label><br>
            <input type="email" id="user_email" required name="user_email" maxlength="32"><br><br>
                    
            <label>Password</label><br>
            <input type="password" id="user_password" required name="user_password" maxlength="32"><br><br>
                    
            <label>Address</label><br>
            <input type="text" id="user_address" required name="user_address" maxlength="64"><br><br>
                    
            <label>Zipcode</label><br>
            <input type="text" id="user_zipcode" required name="user_zipcode" maxlength="11"><br><br>
        <?php 
            if(isset($_POST['send'])){
                $name = addslashes($_POST['user_name']);
                $email = addslashes($_POST['user_email']);
                $password = addslashes($_POST['user_password']);
                $address = addslashes($_POST['user_address']);
                $zipcode = addslashes($_POST['user_zipcode']);
                    
                if(!empty($name) && !empty($email) && !empty($password)
                && !empty($address) && !empty($zipcode)){
                    if(!$register->register($name, $email, $password,
                    $address, $zipcode, 0)){
                        echo '<label style="color: red">Email already exists!</label>';
                    }
                }else{
                    echo '<label style="color: red">Fill in all the fields.</label>';
                }
            }
                ?>
            <input type="submit" value="Continue" name="send">
        </form> 
            
        <div class="login">
            <label>Already registered?</label>
            <a href="login_user.php"><button>Login in your account</button></a>
        </div>    
    </div>

</body>
</html>