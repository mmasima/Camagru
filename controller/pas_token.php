<?php
session_start();

$con =mysqli_connect("localhost", "root", "Obakeng", "camagru");

if(isset($_POST['new_pas']))
{
    $user_password = $_POST['new_password'];
    if (strlen($user_password) < 8)
    {
        echo "<script>alert(' password 8 characters minimum!') </script>";
        header("Refresh:0; url=change_password.php");
    }
    
    if(isset($_POST['new_password']) === isset($_POST['retype_password']))
    {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $token = $_GET['token'];
        $sql = "UPDATE users set password='$password' WHERE token='$token' LIMIT 1";

        if ($result = mysqli_query($con, $sql)) 
        {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your password has been successfully changed";
            $_SESSION['type'] = 'alert-success';
            "<script>alert('password changed successfully!')</script>";
            header('location: register.php');
        }
    } 
    else {
        echo "passwords dont match!";
    }
}
 
?>