<?php

require 'connection.php';
include 'webroot.php';

session_start();


//register
if(isset($_POST['register']))
{
        $user_name =  $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $cuser_password = $_POST['cuser_password'];
    
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $user_password))
        {
            echo "<script>alert('Your password is not strong enough!')</script>";
            return ;
        } 
        else if ($user_password === $cuser_password) 
        {
            $user_password = password_hash($user_password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(10));

            if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
                echo "<script>alert('Your email is not valid!') </script>";
            }
            else 
            {
                 
                $select = $conn->prepare("SELECT  * FROM users WHERE user_email = ?");
                
                $array = array($user_email);
                $select->execute($array);
                $res = $select->fetch();
                }
                if (!empty($res)){
                    echo "<script>alert('This email is already registered!, try another one')</script>";
                    return ;
                }
                else 
                {  
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['verified'] = 0;
                    //send mail 
                
                    $message = $msg = "Hi there, click on this <a href=\"http://127.0.0.1:8080/".WEBROOT."/controller/verify.php?token=" . $token . "\">link</a> to verify";
                
                    mail($user_email, "Verify your email", $message, "From :info@camagru.com");
                    
                    $sql = "INSERT INTO users(user_name, user_email, user_password, token)
                                values ('$user_name', '$user_email', '$user_password', '$token')";
                    // use exec() because no results are returned
                    if ($conn->exec($sql)){
                        echo "<script type='text/javascript'>
                        alert('registration successful, check email to verify account!');
                        location = 'login.php';
                    </script>";
                    }
                }
            }
        else
        {
            echo "<script>alert('Passwords dont match!')</script>";
        }
}
