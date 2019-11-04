<?php
function img($fl_extn, $fl_tmp)
{
    $con = mysqli_connect("localhost", "root", "Obakeng", "camagru");
    $file_path = substr(md5(time()), 0, 10) . '.' . $fl_extn;
    move_uploaded_file($fl_tmp, '../uploads' . $file_path);
    //$time = time();
    $_SESSION['PersonID'] = $PersonID;
    $insert = "INSERT INTO images (image, PersonID) values('$file_path', '$PersonID')";
    $run_insert = mysqli_query($con, $insert);
    if($run_insert){
        echo "OK";        
    }
    else {
        die(mysqli_error($con));
    }
}
?>