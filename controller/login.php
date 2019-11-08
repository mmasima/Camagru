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
        $_SESSION['PersonID'] = $res['PersonID'];     
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
                header('location: ../view/images.php');
            }
            else
            {
                echo "<script>alert('password is incorrect!, try again')</script>";
            }
        }   
    }
    else
    {
        echo "<script>alert('email is not correct!, try again')</script>";
    }
}
?>