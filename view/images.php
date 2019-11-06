<?php
    session_start();

    // if (!isset($_SESSION["PersonID"])) {
    //     echo "<script>alert('You need to log in first')</script>";
    //     header('location: ./login.php');
    //     return;
    // }

    $userId = $_SESSION['PersonID'];

    include '../controller/upload_images.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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