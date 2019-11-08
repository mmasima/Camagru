<?php
session_start();

include '../controller/profile_update.php';

if (!isset($_SESSION["PersonID"])) 
{
    echo "<script type='text/javascript'>
    alert('you need to login first!');
    location = 'login.php';
    </script>";
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update Profile</title>
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
                    <h2>Update Profile</h2>
                </td>
            </tr>
            <tr>
                 <td align = "right"><strong>change username :</strong></td>
                 <td><input type="text" name="user_name" placeholder="Enter new username"></td>
                 <td align = "center" colspan = "8"><input type="submit" name="username" value="Change!"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Change Email :</strong></td>
                 <td><input type="email" name="user_email" placeholder="Enter new email"></td>
                 <td align = "center" colspan = "8"><input type="submit" name="email" value="Change!"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Change Password :</strong></td>
                 <td><input type="password" name="user_password" placeholder="Enter new password"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Re Enter Pass :</strong></td>
                 <td><input type="password" name="cuser_password" placeholder="Confrim your password"></td>
                 <td align = "center" colspan = "8"><input type="submit" name="password" value="Change!"></td>
            </tr> 
        </table>
    </form>
</body>
</html>