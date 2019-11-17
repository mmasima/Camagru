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
<div class="vieo-wrap">
   <video id="video" playsinline autoplay></video> 
</div>
<div class="controller">
    <button id="snap">Capture</button>
</div>
<canvas id="canvas" width="640px" height="480"></canvas>
<button type="submit" id = "save" name ="save" class="button">submit-photo</button>
<script>
'use strict';

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
const errorMsgElement = document.getElementById('span#ErrorMsg');

const constraints = {
    audio : false, 
    video:{
        width :1280, height: 720 
    }
};

async function init()
{
    try{
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream); 
    }
    catch(e){
        errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
    }
}

function handleSuccess(stream){
    window.stream = stream;
    video.srcObject = stream;
}

init();

var context = canvas.getContext('2d');
snap.addEventListener("click", function(){
    context.drawImage (video, 0, 0, 640, 480)
})

</script>
<center><h3><a href= "../index.php">main menu</a></h3></center>
</body>
</html>