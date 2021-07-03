<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <style>
        body{ font: 14px sans-serif; background-color:white; }
        .wrapper{ width: 360px; padding: 20px; background-color:grey;} 
        span{color:red;}
    </style
    <body>
        <?php include_once("validate_reg.php"); ?>

        <div class="wrapper">
            <h2>Sign Up</h2>
            
            <p>Please fill this form to create an account.</p>

            <form class = "container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                First name <input type="text" name="firstName" value="<?php echo $firstName;?>">
                <span>* <?php echo $firstNameErr ?></span><br><br>

                Last name <input type="text" name="lastName" value=<?php echo $lastName;?>>
                <span>* <?php echo $lastNameErr ?></span><br><br>

                Phone <input type="tel" name="phone" value=<?php echo $phone;?>>
                <span>* <?php echo $phoneErr ?></span><br><br>

                Email <input type="email" name="email" value=<?php echo $email;?>>
                <span>* <?php echo $emailErr ?></span><br><br>
                    
                Gender <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female")echo "checked";?> value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male")echo "checked";?> value="male">Male
                <br><br>
                    
                Password <input type="password" name="pwd" value=<?php echo $pwd;?>>
                <span>* <?php echo $pwdErr ?></span><br><br>

                Confirm Password <input type="password" name="cpwd" value=<?php echo $cPwd; ?>>
                <span>* <?php echo $cPwdErr ?></span><br><br>

                <input type="submit" name = "submit" value="register"><br>

                <p>Already have an account? <a href="login.php">Login here</a>.</p><br>
                <?php 
                    if(!empty($msg)){
                    echo '<div>' . $msg . '</div>';
                    }else{
                        echo $msgErr;
                    }        
                ?>
            </form>
        </div>
        
    </body>
</html>