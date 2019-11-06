<?php
session_start();

require '../config/db_con.php';

if(isset($_GET['token']) && isset($_POST['new_pas']))
{
    try {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if(strlen($_POST['new_password']) >= 8 && $_POST['new_password'] === $_POST['retype_password'])
        {
            
            $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $token = $_GET['token'];
            $sql = "UPDATE users set user_password='$password' WHERE token='$token' LIMIT 1";
            
            if ($conn->exec($sql)){
                echo "<script type='text/javascript'>
                alert('password change successful, redirecting to login!');
                location = 'login.php';
            </script>";
        }
            
            
        } 
        else {
            echo"<script>alert('passwords dont match or is less tha 8 characters!')</script>";;
        }
        
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
 
?>