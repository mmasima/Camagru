<?php
session_start();

function SetComments($conn)
{
    require '../controller/connection.php';

    if (isset($_POST['like']))
    {
        $PersonID = $_SESSION['PersonID'];
        $image_id = $_POST['image_id'];

        //send email
        $con = "SELECT * from users WHERE PersonID = '$PersonID'";
        $result = $conn->prepare($con);
        $result->execute();
        $row = $result->fetch();
        $user_email = $row['user_email'];
       

        $sql = "SELECT * FROM likes";
        $result = $conn->prepare($sql);
        $result->execute();
        $row = $result->fetch();

        if(!($row['image_id'] == $image_id &&  $row['PersonID'] ==  $PersonID))
        { 
            if($row['notify'] == 1)
            {
                 $message = "Hi there, someone liked your Camagru post";
                mail($user_email,"Camagru", $message, "From :info@camagru.com");
            }
            $sql = "INSERT INTO likes(PersonID, image_id) values ('$PersonID', '$image_id')";
            $result = $conn->prepare($sql);
             if($result->execute()){
            echo "<script type='text/javascript'>
                         alert('you liked this image!');
                         location = 'gallery.php';
                    </script>";
            }
            else {
                echo "Connection failed";
            }
        }
        else {
            echo "<script type='text/javascript'>
                        alert('you already liked it!');
                        location = 'gallery.php';
                    </script>";
            
        }
        
    }
    if (isset($_POST['commentSubmit']))
    {
        
        $PersonID = $_SESSION['PersonID'];
        $image_id = $_POST['image_id'];
        $comment= $_POST['comment_content'];

        //send email
        $con = "SELECT * from users WHERE PersonID = '$PersonID'";
        $result = $conn->prepare($con);
        $result->execute();
        $row = $result->fetch();
        $user_email = $row['user_email'];
        if($row['notify'] == 1)
        {
             $message = "Hi there, someone commented on your Camagru post";
             mail($user_email, "Camagru", $message, "From :info@camagru.com");
        }

        $sql = "INSERT INTO comments(comment, image_id, PersonID) values ('$comment', '$image_id', '$PersonID')";
       
        $result = $conn->prepare($sql);
        if($result->execute()){
            echo "<script type='text/javascript'>
                        alert('comment added!');
                        location = 'gallery.php';
                    </script>";
        }
        else {
            echo "Connection failed";
         }
       
    }
}