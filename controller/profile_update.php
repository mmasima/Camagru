<?php
require 'connection.php';

//user_name change
if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password']))
{
    if(isset($_POST['username']))
    {
            $user_name = $_POST['user_name'];
            $sql = "UPDATE users set user_name='$user_name'";
            if (!empty($conn->exec($sql)))
            {
                echo"<script>alert('username changed!')</script>";
                
                return ;
            }
            else{
                echo"<script>alert('you cant leave this field empty!')</script>";
                return ;
            }
    }
    
    if(isset($_POST['email']))
    {
        $user_email = $_POST['user_email'];
       $sql = "UPDATE users set user_email='$user_email'";
       if(!empty($conn->exec($sql)))
       {
        echo"<script>alert('email changed!')</script>";
        return ;
       }
        else
        {
            echo"<script>alert('you cant leave this field empty!')</script>";
            return ;
        }
    }
    
    if (isset($_POST['password']))
    {
        if(strlen($_POST['user_password']) >= 8 && $_POST['user_password']=== $_POST['cuser_password'])
        {
            $user_password = password_hash($_POST['user_password'],PASSWORD_DEFAULT); 
            $sql = "UPDATE users set user_password ='$user_password'";
    
            if(!empty($conn->exec($sql)))
            {
            echo"<script>alert('password changed!')</script>";
            return ;
            }
            else
            {
                echo"<script>alert('you cant leave this field empty!')</script>";
                return ;
            }
        }
        else 
        {
            echo"<script>alert('passwords dont match or is less tha 8 characters!')</script>";
            return;
        }
    }
    //fix later
    $message = "Hi there, Some information on your Camagru profile has been changed!";
                
    mail($user_email, "Profile details changed", $message, "From :info@camagru.com");
}
?>