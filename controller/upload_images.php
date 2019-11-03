<?php
 session_start();

$con = mysqli_connect("localhost", "root", "Obakeng", "camagru");


if(isset($_FILES['upload']))
{
    pre_r($_FILES);
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/'. $_FILES['userfile']['tmp_name']);
    function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '<pre>';
    }
}
?>