<?php
require 'connection.php';

//user_name change

$ID = $_SESSION['PersonID'];

$user_email = $_SEESION['user_email'];

if(isset($_POST['username']))
{
    
    if (empty($_POST['user_name']))
    {
        echo"<script>alert('you cant leave this field empty!')</script>";
        return ;
    }
    $user_name = $_POST['user_name'];

    $sql = "UPDATE users set user_name = '$user_name' WHERE PersonID = '$ID'";

    if (($conn->exec($sql)))
    {
        $message = "Hi there, Some information on your Camagru profile has been changed!";

        mail($user_email, "Profile details changed", $message, "From :info@camagru.com");

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

    echo $user_email = $_POST['user_email'];

    $sql = "UPDATE users set user_email='$user_email' WHERE PersonID = '$ID'";

    if($conn->exec($sql))
   {
    $message = "Hi there, Some information on your Camagru profile has been changed!";
            
    mail($user_email, "Profile details changed", $message, "From :info@camagru.com");

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

        if($conn->exec($sql))
        {
         $message = "Hi there, Some information on your Camagru profile has been changed!";
            
         mail($user_email, "Profile details changed", $message, "From :info@camagru.com");

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
?>