<?php
    
    // Define variables and initialize with empty values
    $phone = $pwd = $login= "";
    $phoneErr = $pwdErr = $login_err = "";
        // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if phone is empty
        if(empty($_POST["phone"])){
            $phoneErr = "Please enter phone.";
        } else{
            $phone = test_ip($_POST["phone"]);
        }
        
        // Check if password is empty
        if(empty($_POST["pwd"])){
            $pwdErr = "Please enter your password.";
        } else{
            $pwd = test_ip($_POST["pwd"]);
        }
        // Validate credentials
        if(empty($phoneErr) && empty($pwdErr)){
            //verify password and phone
            if($phone!=$_SESSION["phone"] || $pwd!=$_SESSION["password"]){
                $login_err="Invalid phone or password.";
            }elseif($phone==$_SESSION["phone"] && $pwd==$_SESSION["password"]){
                //session_start();            
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                
                $_SESSION["phone"] = $phone;                            
                
                // Redirect user to welcome page
                $login =$_SESSION["phone"]." have successfully loggedin";
                echo "<script> location.href='welcome.php'; </script>";
                exit();
            }else{
                $login_err = "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    //this function trims, strip slashes and and convert data to special html characters
    function test_ip($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>