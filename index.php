<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
</head>
<style>

* {
    margin: 0;
    padding : 0;
}
.wrapper{
    width: 1170px;
    margin: auto;
}
header{
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("background_image.jpg");
    height: 100vh;
    -webkit-background-size : cover;
    background-size: cover ;
    background-position: center center;
    position: relative;
}
.nav-area{
    float: right;
    list-style: none;
    margin-top: 30px;
}
.nav-area li{
    display : inline-block;
}
.nav-area li a{
    color: #fff;
    text-decoration: none;
    padding: 5px  20px;
    font-family: poppins;
    font-size: 14px;
}
.nav-area li  a:hover{
     background: #fff;
     color:#000;
}
.logo img{
    width: 100px;
    float: left;
    height: auto;
}
.Welcome-text{
    position: absolute;
    width: 600px;
    height: 300px;
    margin: 20% 30%;
    text-align: center;
}
.Welcome-text h1{
    text-align: center;
    color: #fff;
    text-orientation: uppercase;
    font-size: 60px;
}
.Welcome-text a{
    border: 1px solid #fff;
    padding: 10px  25px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 14px;
    margin-top: 20px;
    display: inline-block;
    color: #fff;
}
.Welcome-text a:hover{
    background: #fff;
    color :#333;
}
</style>
<body> 
    <header>
        <div class="wrapper">
             <div class="logo">
                  <img src= "Camagru logo.png" alt=""> 
            </div>
            <ul class="nav-area">
                <li><a href="./view/profile_update.php">update profile</a></li>
                <li><a href="./view/images.php">upload image</a></li>
                <li><a href="#">Camera</a></li>
                <li><a href="#">about</a></li>
                <li><a href="./controller/logout.php">logout</a></li>
            </ul>
        </div>
    
    <div class ="Welcome-text">
        <h1>Camagru</h1>
        <a href="#"> Contact us</a>  
    </div>
</body>
</html>