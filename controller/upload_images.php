<?php
require 'functions.php';
$con = mysqli_connect("localhost", "root", "Obakeng", "camagru");


if(isset($_POST["submit"])) 
{
    if(isset($_FILES["img"])){
        if(empty($_FILES['img']['name']))
        {
            echo "you need to insert a image";
        }
        else {
            $allowed = ['png', 'jpeg', 'jpg'];
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
?>