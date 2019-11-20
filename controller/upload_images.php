<?php
session_start();
require 'functions.php';
require 'connection.php';
   
    
    file_put_contents($dest, $data);

if(isset($_POST["submit"])) 
{
    if(isset($_FILES["img"])){
        if(empty($_FILES['img']['name']))
        {
            echo "you need to insert a image";
        }
        else {
            $allowed = ['png', 'jpeg', 'jpg','gif'];
            $fl_name = $_FILES['img']['name'];
            $fl_extn = strtolower(end(explode('.', $fl_name)));
            $fl_temp = $_FILES['img']['tmp_name'];
            
           
            if (in_array($fl_extn, $allowed)){
                img($fl_extn, $fl_temp) ;
            }
            else {
                echo "extention you used is not an image";
            }
            
        }
    } 
}
if(isset($_POST["img"])) 
{
    $PersonID = $_SESSION['PersonID'];
    $img = $_POST['img']; 
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $data1 = uniqid('', true).".png";
    $dest = "../controller/uploads/".$data1;

    file_put_contents($dest, $data);
    $stmt = $conn->prepare("INSERT INTO images(`image`, `PersonID`)
            VALUES (?, ?)");
    $stmt->execute([$dest, $PersonID]);
}
?>