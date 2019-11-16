<?php

require 'connection.php';

session_start();

//login 
if(isset($_POST['login-btn']))
{   
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    $select = $conn->prepare("SELECT * from users where user_email='$user_email' LIMIT 1");
    $array = array($user_email);
    $select->execute($array);
    $res = $select->fetch();
    

    if(!empty($res))
    {     
        $_SESSION["PersonID"] = $res["PersonID"];
        $_SESSION["user_name"] = $res["user_name"];
        $_SESSION["user_email"] = $res["user_email"];
        $_SESSION["verified"] = $res["verified"];
        // First Database query check if user is verified else echo alert
        if ($res['verified'] == 0)
        {
            echo "<script>alert('verify account first')</script>";
            return ;
        }
        else 
        {
            if(password_verify($user_password, $res['user_password']))
            {
                header('location: ../index.php');
            }
            else
            {
                echo "<script>alert('password is incorrect!, try again')</script>";
                return ;
            }
        }   
    }
    else
    {
        echo "<script>alert('email is not correct!, try again')</script>";
    }
}
?>