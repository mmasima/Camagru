<?php
session_start();
    if (!isset($_SESSION["PersonID"])) 
    {
        echo "<script type='text/javascript'>
        alert('you need to login first!');
        location = 'login.php';
        </script>";
        return;
    }

    include '../controller/upload_images.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>images</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="img" id="">
    <input type="submit" value="Upload Image" name="submit">
</form>

<h1>
    camera
</h1>
<div style="display: flex">
        <div style="display: flex">
            <div style="display: grid">
                <video id="video" autoplay></video>
                <button id="snap">Capture</button>
            </div>
            <div style="display: grid">
                <canvas id="canvas" width=300 height=300></canvas>
                <button id="apply">Apply</button>
                <button id="save" name="img">Save</button>
                <select id="stickers">
                    <option value="none">none</option>
                    <option value="peace">peace</option>
                    <option value="arrow">arrow</option>
                    <option value="apex">apex</option>
                </select>
                 </div>
                     <canvas id="edit" width=300 height=300></canvas>
            </div>
            <div>
                <img id="peace"  src="stickers/peace.png" alt="peace" width=100 height=100>
                <h3>peace</h3>
                <img id="arrow" src="stickers/arrow.jpeg" alt="arrow" width=100 height=100>
                <h3>arrow</h3>
                <img id="apex" src="stickers/apex.jpg" alt="apex" width=100 height=100>
                <h3>apex</h3>
            </div>
            <br>
        </div>   
        <script src="../js/camera.js">
        </script>
<center><h3><a href= "../index.php">main menu</a></h3></center>
</body>
</html>