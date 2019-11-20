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
    padding : 2px 1px 2px ;
}
.wrapper{
    width: 100%;
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
    margin: 20% 5%;
    width: 100%;
    text-align: center;
}
.Welcome-text h1{
    text-align: center;
    color: #fff;
    text-orientation: uppercase;
    font-size: 50px;
    width: 100%;
}

}
.Welcome-text a:hover{
    width:100%;
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
                <li><a href="./view/images.php">images</a></li>
                <li><a href="#">Camera</a></li>
                <li><a href="./view/gallery.php">gallery</a></li>
                <li><a href="./controller/logout.php">logout</a></li>
            </ul>
        </div>
    
    <div class ="Welcome-text">
        <h1>Camagru</h1> 
    </div>
</body>
</html>