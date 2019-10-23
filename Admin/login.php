<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<?php
session_start();
$con =mysqli_connect("localhost", "root", "Obakeng", "Camagru");
?>
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
                    <h2>Login here!</h2>
                </td>
            </tr>
            <tr>
                 <td align = "right"><strong>Email :</strong></td>
                 <td><input type="text" name="user_email" placeholder="enter your email" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Password :</strong></td>
                 <td><input type="password" name="user_password" placeholder="enter your password" required ="required"></td>
            </tr>
             <td align = "center" colspan = "8"><input type= "submit" name = "Login" value= "Login"></td>
        </table>
    </form>
    <center><h3>Not a User?<a href= "register.php">register here</a></h3></center>
    <?php
    if(isset($_POST['Login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $sel = "select * from register_user where user_email= '$user_email' AND user_password = '$user_password'";
        
        $run = mysqli_query($con, $sel);
        
        $check = mysqli_num_rows($run);
        
        if ($check == 0){
            echo "<script>alert('password or email is not correct!, try again')</script>";
                exit();
        }
        else{
            $_SESSION['user_email'] = $user_email; 
            echo "<script>alert('logging in!')</script>";
        exit();
        }
}
?>
</body>
</html>