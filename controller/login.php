
<?php
session_start();

require '../config/db_con.php';

//login 
if(isset($_POST['login-btn']))
{   
    
    try {
        
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        $select = $conn->prepare("SELECT * from users where user_email='$user_email' LIMIT 1");
        $array = array($user_email);
        $select->execute($array);
        $res = $select->fetch();

        
        if(!empty($res))
        {
        $_SESSION['verified'] = $res['verified'];
            //$_SESSION['veridied'] = 
            // First Database query check if user is verified else echo alert
            if ($_SESSION['verified'] === 0)
            {
                echo "<script>alert('verify account first')</script>";
                return ;
            }

            else {
                if(password_verify($user_password, $user['user_password'])){
                    $_SESSION['PersonID'] = $user['PersonID'];
                    $_SESSION['user_name'] = $user['user_name'];
                    $_SESSION['user_email'] = $user['user_email'];
                    $_SESSION['verified'] = $user['verified'];
                    header('location: ../view/images.php');
                }
                else
                    echo "<script>alert('password is incorrect!, try again')</script>";
            }   
        }else{
                echo "<script>alert('email is not correct!, try again')</script>";
            }
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
?>