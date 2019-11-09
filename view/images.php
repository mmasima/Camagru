<?php
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
</body>
</html>