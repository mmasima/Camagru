<?php
require 'connection.php';
session_start();

//user_name change

$ID = $_SESSION['PersonID'];

$user_email = $_SESSION['user_email'];

if(isset($_POST['username']))
{
    
    if (empty($_POST['user_name']))
    {
        echo"<script>alert('you cant leave this field empty!')</script>";
        return ;
    }
    $user_name = $_POST['user_name'];

    $sql = "UPDATE users set user_name = '$user_name' WHERE PersonID = '$ID'";
    $result = $conn->prepare($sql); 
    if ($result->execute())
    {
        echo"<script>alert('username changed!')</script>";

        return ;
    }
}
if(isset($_POST['email']))
{
    if(empty($_POST['user_email']))
    {
        echo"<script>alert('you cant leave this field empty!')</script>";
        return ;
    }
    $user_email = $_POST['user_email'];
    $select = $conn->prepare("SELECT  * FROM users WHERE user_email = ?");
                
    $array = array($user_email);
    $select->execute($array);
    $res = $select->fetch();
    
    if (!empty($res)){
        echo "<script>alert('This email is already registered!, try another one')</script>";
        return ;
    }

     $user_email = $_POST['user_email'];

    $sql = "UPDATE users set user_email='$user_email' WHERE PersonID = '$ID'";

    if($conn->exec($sql))
   {
    echo"<script>alert('email changed!')</script>";
    return ;
   }
}

if (isset($_POST['password']))
{
    if (empty($_POST['password']))
    {  
        echo"<script>alert('you cant leave this field empty!')</script>";
        return;
    } 
            
    if(strlen($_POST['user_password']) >= 8 && $_POST['user_password']=== $_POST['cuser_password'])
    {
        $user_password = password_hash($_POST['user_password'],PASSWORD_DEFAULT); 
        $sql = "UPDATE users set user_password ='$user_password' WHERE PersonID = '$ID'";

        $result = $conn->prepare($sql); 
        if($result->execute())
        {
            echo"<script>alert('password changed!')</script>";
            return ;
        }
    }
    else 
    {
        echo"<script>alert('passwords dont match or is less tha 8 characters!')</script>";
        return;
    }
}
if(isset($_POST['notify_off']))
{
    $sql = "UPDATE users set notify =0 WHERE PersonID = '$ID'";         
    $result = $conn->prepare($sql); 
    if($result->execute())
    {
        echo"<script>alert('notifications are off!')</script>";
        return ;
    }
}

if(isset($_POST['notify_on']))
{
    $sql = "UPDATE users set notify =1 WHERE PersonID = '$ID'";         
    $result = $conn->prepare($sql);
    if($result->execute())
    {
        echo"<script>alert('notifications are on!')</script>";
        return ;
    }
}
?>