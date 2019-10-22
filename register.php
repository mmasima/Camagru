<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
</head>
<?php
$con =mysqli_connect("localhost", "root", "obakeng", "users");
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
    <form action="register.php" method = "post" enctype="multipart/form-data">
        <table align = "center"  bgcolor="lightblue" width=400>
            <tr align = center>
                <td colspan = "8">
                    <h2>Register here!</h2>
                </td>
            </tr>
            <tr>
                 <td align = "right"><strong>Name :</strong></td>
                 <td><input type="text" name="user_name" placeholder="enter your name" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Email :</strong></td>
                 <td><input type="text" name="user_email" placeholder="enter your email" required ="required"></td>
            </tr>
            <tr>
                 <td align = "right"><strong>Password :</strong></td>
                 <td><input type="password" name="user_password" placeholder="enter your password" required ="required"></td>
            </tr> 
            <tr>
                 <td align = "right"><strong>Number :</strong></td>
                 <td><input type="text" name="user_number" placeholder="enter your number" required ="required"></td>
            </tr>
             <td align = "center" colspan = "8"><input type= "submit" name = "register" value= "Register Now!"></td>
        </table>
    </form>
    <?php
    if(isset($_POST['register'])){
        $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
        $user_email = mysqli_real_escape_string($con,$_POST['user_email']);
        $user_password = mysqli_real_escape_string($con,$_POST['user_password']);
        $user_number = mysqli_real_escape_string($con,$_POST['user_number']);
    }
    if ($user_password =='' OR $user_name =='' OR $user_email =='' OR $user_number ==''){
        echo "<script>alert('PLease fill all the fields!')</script>";
        exit();
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Your email is not valid!') </script>";
        exit();
    }
    if (strlen($user_password) < 8){
        echo "<script>alert('8 characters minimum!') </script>";
        exit();
    }

    $sel_email = "select * from register_user where user_email ='user_email'";
    $run_email = mysqli_query($con, $sel_email);

    $check_email = mysqli_num_rows($run_email);
    if($check_email == 1){
        echo "<script>alert('This email is already registered!, try another one') </script>";
        exit();
    }
    else{
       echo $insert = "insert into register_user(user_name,user_email, user_password , user_phone_number)  value ('$user_name', '$user_email', '$user_password', '$user_number', NOwW())"; 
    }
?>
</body>
</html>