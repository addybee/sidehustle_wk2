<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body{ font: 14px sans-serif; }
            .wrapper{ width: 360px; padding: 20px; background-color:grey;} 
            span{color:red;}
        </style>
    </head>
    <body>
        <?php 
            include_once("validate_login.php");
        ?>
        <div class="wrapper">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" value="<?php echo $phone; ?>">
                    <span>* <?php echo $phoneErr; ?></span>
                </div> <br>  
                <div>
                    <label>Password</label>
                    <input type="password" name="pwd">
                    <span>* <?php echo $pwdErr; ?></span>
                </div> <br>
                <div>
                    <input type="submit" value="Login">
                </div><br>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p><br>
            </form>
            <?php 
            if(!empty($login_err)){
                echo '<span>' . $login_err . '</span>';
            }else{
                echo '<div>' . $login . '</div>';
            }        
            ?>
        </div>
    </body>
</html>