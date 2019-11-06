<?php
session_start();

require '../config/db_con.php';

if (isset($_GET['token'])) {
    
    try {
        $token = $_GET['token'];
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //setting verified to one 
        $sql = "UPDATE users SET verified=1 WHERE token='$token'";
        $conn->exec($sql);
        echo "<script type='text/javascript'>
                        alert('registration successful, check email to verify account!');
                        location = '../view/login.php';
                      </script>";
    } catch (PDOException $e) {
        echo "Couldn't Verify: ". $e->getMessage();
    }
} 