<?php
$firstName= $lastName= $phone= $email= $gender= $pwd= $submit= $cPwd= $msg="";
$firstNameErr= $lastNameErr= $phoneErr= $emailErr= $genderErr= $pwdErr= $cPwdErr= $msgErr="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //validate first name
    if(empty($_POST["firstName"])){
        $firstNameErr="first name required!";
        return;
    }else{
        $firstName= test_ip($_POST["firstName"]);
        if(!preg_match("/^[a-zA-Z\s]+$/", $firstName)){
            $firstNameErr= "only letter and white space are allowed! ";
        }
    }
    //validate last name
    if(empty($_POST["lastName"])){
        $lastNameErr="last name required!";
        return;
    }else{
        $lastName= test_ip($_POST["lastName"]);
        if(!preg_match("/^[a-zA-Z\s]+$/", $lastName)){
            $lastNameErr= "only letter and white space are allowed! ";
        }
    }
    //validate phone number
    if(empty($_POST["phone"])){
        $phoneErr= "";
    }else{
        $phone= test_ip($_POST["phone"]);
        if(!preg_match("/^((\d){11})$/", $phone)){
            $phoneErr ="invalid phone number!";
        }
    }
    //validate email
    if(empty($_POST["email"])){
        $emailErr= "email is required!";
    }else{
        $email= test_ip($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr= "invalid email format!";
        }
    }
    // VALIDATE GENDER
    if(empty($_POST["gender"])){
        $genderErr= "gender is required!";
    }else{
        $gender= test_ip($_POST["gender"]);
    }
    //validate password
    if(empty($_POST["pwd"])) {
        $pwdErr="enter password!"; 
    } else {
        $pwd = test_ip($_POST["pwd"]);
        if (strlen($pwd) < 8) {
            $pwdErr = "Your password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$pwd)) {
            $pwdErr = "Your password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$pwd)) {
            $pwdErr = "Your password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$pwd)) {
            $pwdErr = "Your password Must Contain At Least 1 Lowercase Letter!";
        }
    }
        //validate confirm password
    if(empty($_POST["cpwd"])){
        $cPwdErr="confirm password";
    }else{
        $cPwd = test_ip($_POST["cpwd"]);
        if(empty($pwdErr) && ($pwd != $cPwd)){
            $cPwdErr = "Password did not match.";
        }
    }

    if(empty($firstNameErr) && empty($lastNameErr) && empty($phoneErr) && empty($emailErr) 
    && empty($pwdErr) && empty($cPwdErr)){
        $_SESSION["firstName"]=$firstName;
        $_SESSION["lastName"]=$lastName;
        $_SESSION["phone"]=$phone;
        $_SESSION["email"]=$email;
        $_SESSION["gender"]=$gender;
        $_SESSION["password"]=$pwd;
        $_SESSION["cPassword"]=$cPwd;
        $msg= $_SESSION["firstName"]." your registration is successful!!!";
    }else{
        $msgErr="Oops! Something went wrong. Please try again later.";
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