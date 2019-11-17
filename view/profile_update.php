<?php
session_start();

include '../controller/profile_update.php';
;
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <table align = "center" width=400>
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
            <tr>
            <td 
                align = "center" colspan = "8"><input type="submit" name="notify_off" value="turn off email notification"></td>
            </tr>
            <tr> <td 
                align = "center" colspan = "8"><input type="submit" name="notify_on" value="turn on email notification"></td>
            </tr>
        </table>
    </form>
    <center><h3><a href= "../index.php">main menu</a></h3></center>
</html>