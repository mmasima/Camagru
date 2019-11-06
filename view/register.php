<?php
    include '../controller/register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
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
    <form method="post" enctype="multipart/form-data">
        <table align = "center"  bgcolor="lightblue" width=400>
            <tr align = center>
                <td colspan = "8">
                    <h2>Register here!</h2>
                </td>
            </tr>
            <tr>
                 <td align = "right"><strong>Name :</strong></td>
                 <td><input type="text" name="user_name" placeholder="Enter your name" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Email :</strong></td>
                 <td><input type="email" name="user_email" placeholder="Enter your email" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Password :</strong></td>
                 <td><input type="password" name="user_password" placeholder="Enter your password" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Re Enter Pass :</strong></td>
                 <td><input type="password" name="cuser_password" placeholder="Confrim your password" required ="required"></td>
            </tr> 
             <td align = "center" colspan = "8"><input type="submit" name="register" value="Register Now!"></td>
            
        </table>
    </form>
    <center><h3>Alreadey Registered? <a href= "login.php">login here</a></h3></center>

</body>
</html>