<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>🚦</text></svg>">
    <link rel="stylesheet" href="CSS/forms/form_login_user.css">
</head>
<body>
    <?php 
        require_once "..\model\user_classes\userLogin.php";
        $login = new userLogin;
    ?>
    <div class="container">
        <div class="message">
            <h1>Log in</h1>
        </div>

        <form method="POST">
            <label>Email</label><br>
            <input type="email" id="user_email" required name="user_email"><br><br>
                
            <label>Password</label><br>
            <input type="password" id="user_password" required name="user_password"><br><br>

        <?php 
            if(isset($_POST['send'])){
                $email = addslashes($_POST['user_email']);
                $password = addslashes($_POST['user_password']);
                    
                if(!empty($email) && !empty($password)){
                    if(!$login->loginUser($email, $password)){

                    }
                }
            }
        ?>

            <input type="submit" value="Continue" name="send">
        </form> 
            
        <div class="login">
            <label>Don't have you an account yet?</label>
            <a href="register_user.php"><button>Create Account</button></a>
        </div>    
    </div>

</body>
</html>