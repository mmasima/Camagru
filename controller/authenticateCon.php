<?php

   session_start();

   require '../config/db_con.php';
 
//forgot password
if(isset($_POST['change_pas']))
{
    $user_email = $_POST['user_email'];

    $sel_email = "SELECT * from users where user_email='$user_email' limit 1";
    $run_email = mysqli_query($con, $sel_email);
    

    if(mysqli_num_rows($run_email) != 1)
    {
        echo"<script>alert('Sorry, no user exists on our system with that email')</script>";
    }
    else
    {
        $user = mysqli_fetch_assoc($run_email);
        //send mail
        $token = $user['token'];
        $message = "Hi there, click on this <a href=\"http://localhost:8080/Camagru/view/change_password.php?token=" . $token . "\">link</a> to change password";
        mail($user_email, "change your password", $message, "From :info@camagru.com");

        echo"<script>alert('An email has been sent to you, you can close this page!')</script>";
    }
}
?>