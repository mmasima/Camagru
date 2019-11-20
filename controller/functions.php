<?php
require '../config/database.php';

function img($fl_extn, $fl_tmp)
{
    require '../config/db_con.php';
    try {
    
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $file_path = '../controller/uploads/' . substr(md5(time()), 0, 10) . '.' . $fl_extn;
        move_uploaded_file($fl_tmp, $file_path);
        
        $PersonID = $_SESSION['PersonID'];
        

        $insert = "INSERT INTO images (image, PersonID) values('$file_path', '$PersonID') ";
        $result = $conn->prepare($insert); 
        if($result->execute()){
            echo "OK";        
        }
        else {
            echo "Connection failed";
        }
    }
    catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
}
?>