<?php
    include '../controller/forget_password.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forgot password</title>
    <link rel="stylesheet" href="styles.css">

<body>
    <form action="" method = "post" >
        <table align = "center"   width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>insert your email!</h2>
                </td>
            </tr>
            <tr>
                <td align = "right"><strong>Email :</strong></td>
                <td><input type="text" name="user_email" placeholder="enter your email" required ="required"></td>
            </tr>
                <td align = "center" colspan = "8"><input type= "submit" name="change_pas" value= "submit"></td>
        </table>
    </form>
    <center><h3>back to <a href= "login.php"> login</a></h3></center>
</body>
</html>