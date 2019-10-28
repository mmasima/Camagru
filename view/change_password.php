<?php
    include '../controller/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>change_password</title>
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
    <form action="login.php" method = "post" >
        <table align = "center"  bgcolor="lightblue" width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>change password here!</h2>
                </td>
            </tr>
            <tr>
                <td align = "right"><strong>new password :</strong></td>
                <td><input type="text" name="new_password" placeholder="enter your new password" required ="required"></td>
            </tr>
            <tr>
                <td align = "right"><strong>re-enter password :</strong></td>
                <td><input type="text" name="retype_password" placeholder="re-enter password" required ="required"></td>
            </tr>
                <td align = "center" colspan = "8"><input type= "submit" name = "new_password" value= "submit"></td>
        </table>
    </form>
</body>
</html>