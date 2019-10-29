<?php
   session_start();


   $con =mysqli_connect("localhost", "root", "Obakeng", "camagru");
    //login
   if(isset($_POST['login'])){
       $user_email = my_real_escape_string($con, $_POST['user_email']);
       $user_password = my_real_escape_string($con, $_POST['user_password']);

       $sel = "SELECT * from users where user_email='$user_email'";
       
       $run = mysqli_query($con, $sel);
       
       if(mysqli_num_rows($run) > 0){
           $user = mysqli_fetch_assoc($run);

           if(password_verify($user_password, $user['password']))
           {
                $_SESSION['id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                header('location: ../index.php');
           }
       }
       
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

//register
if(isset($_POST['register']))
{
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $cuser_password = $_POST['cuser_password'];
    
    if (strlen($user_password) < 8){
         echo "<script>alert(' password 8 characters minimum!') </script>";
         header("Refresh:0; url=register.php");
     }

    if ($user_password === $cuser_password){
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(10));
    
    if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
         echo "<script>alert('Your email is not valid!') </script>";
         exit();
     }

     
    $sel_email = "SELECT * from users where user_email='$user_email'";
    $run_email = mysqli_query($con, $sel_email);

    if(mysqli_num_rows($run_email) > 0){
        "<script>alert('This email is already registered!, try another one')</script>";
        header("refresh:0;");
    }
    else
    {  
       $_SESSION['user_email'] = $user_email;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['verified'] = false;
        //send mail
         $message = $msg = "Hi there, click on this <a href=\"http://127.0.0.1:8080/Camagru/controller/verify.php?token=" . $token . "\">link</a> to verify";
    
        mail($user_email, "Verify your email", $message, "From :info@camagru.com");
            
         $insert = "insert into users(user_name, user_email, user_password, token)
                    values ('$user_name', '$user_email', '$user_password', '$token')"; 
        $run_insert= mysqli_query($con, $insert);
        if ($run_insert){
           //echo"<script>alert('registration successful, welcome!')</script>";
            header('location: ../index.php');
        }
    }
}
else
    echo "<script>alert('Passwords dont match!')</script>";
}

//forgot password
if(isset($_POST['change_pas']))
{
    $user_email = $_POST['user_email'];

    $sel_email = "SELECT * from users where user_email='$user_email'";
    $run_email = mysqli_query($con, $sel_email);
    $user = mysqli_fetch_assoc($run_email);

    if(mysqli_num_rows($run_email) <= 0)
    {
        echo"<script>alert('Sorry, no user exists on our system with that email')</script>";
    }
    else
    {
        $token = bin2hex(random_bytes(10));
        $sql = "INSERT INTO password_reset(token) VALUES ('$token')";
		
        //send mail
        echo "<script>alert('Check your email to change password!')</script>";
        $message = "Hi there, click on this <a href=\"http://localhost:8080/Camagru/view/change_password.php?token=" . $token . "\">link</a> to change password";
        mail($user_email, "change your password", $message, "From :info@camagru.com");
    }
}
?>