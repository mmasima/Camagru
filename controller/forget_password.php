<?php
   require 'connection.php';
   include 'webroot.php';
 
//forgot password
if(isset($_POST['change_pas']))
{
    $user_email = $_POST['user_email'];
    $select = $conn->prepare("SELECT * from users where user_email='$user_email' LIMIT 1");
    $array = array($user_email);
    $select->execute($array);
    $res = $select->fetch();
    
    if(empty($res))
    {
        echo"<script>alert('Sorry, no user exists on our system with that email')</script>";
        return ;
    }
    else
    {    
        $token = $res['token'];
            
            //send mail
            $message = "Hi there, click on this <a href=\"http://localhost:8080/".WEBROOT."/view/change_password.php?token=" . $token . "\">link</a> to change password";
            mail($user_email, "change your password", $message, "From :info@camagru.com");

            echo"<script>alert('An email has been sent to you, you can close this page!')</script>";
    }
}
?>