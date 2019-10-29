<?php
    include '../controller/authenticateCon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<style>
body{
    padding: 0px;
    margin: 0px;
    background: skyblue;
}
input{
    padding: 10px;
}
</style> 
<body>
<div><?php include 'eroor.php'; ?></div>
    <form action="login.php" method = "post" >
        <table align = "center"  bgcolor="lightblue" width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>Login here!</h2>
                </td>
            </tr>
            <tr>
                 <td align = "right"><strong>Email :</strong></td>
                 <td><input type="text" name="user_email" placeholder="enter your email" required></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Password :</strong></td>
                 <td><input type="password" name="user_password" placeholder="enter your password" required></td>
            </tr>
             <td align = "center" colspan = "8"><input type= "submit" name ="login-btn" value= "Login!"></td>
             <tr>
                <td class="psw">Forgot <a href="forgot_password.php">password?</a></td>
             </tr>
             
        </table>
    </form>
    <center><h3>Not a User?<a href= "register.php">register here</a></h3></center>
</body>
</html>