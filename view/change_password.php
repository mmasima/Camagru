<?php
    include '../controller/pas_token.php';
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>change_password</title>
    <link rel="stylesheet" href="styles.css">

<body>
    <form method="post" >
        <table align = "center" width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>change password here!</h2>
                </td>
            </tr>
            <tr>
                <td align = "right"><strong>new password :</strong></td>
                <td><input type="password" name="new_password" placeholder="new password" required></td>
            </tr>
            <tr>
                <td align = "right"><strong>re-enter password :</strong></td>
                <td><input type="password" name="retype_password" placeholder="re-enter password" required></td>
            </tr>
                <td align = "center" colspan = "8"><input type= "submit" name="new_pas" value= "submit!"></td>
        </table>
    </form>
</body>
</html>