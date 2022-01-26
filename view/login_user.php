<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="CSS/forms/form_login_user.css">
</head>
<body>
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
        require_once "..\model\user_queries.php";
        $user_query = new userQueries;
        if(isset($_POST['send'])){
            $email = addslashes($_POST['user_email']);
            $password = addslashes($_POST['user_password']);
                
            if(!empty($email) && !empty($password)){
                if(!$user_query->loginUser($email, $password)){

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