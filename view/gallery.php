<?php

    include '../controller/connection.php';
    include 'comment_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>
<style>
.container_box{
	display: flex;
    flex-direction: column;
    box-shadow: 0 1px 4px rgba(0, 0, 0, .6);
    margin-bottom: 10px;
    padding: 20px;
}
</style>
<body>
    <h1>Gallery</h1>
<?php
    $results_per_page = 5;

    $sql = "SELECT * from images";
    $result = $conn->prepare($sql); 
    $result->execute();
    $number_of_results = $result->RowCount();

    $number_of_pages = ceil ($number_of_results / $results_per_page);

    if(!isset($_GET['page']))
    {
        $page = 1;
    }
    else {
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page -1) * $results_per_page;

    $sql = "SELECT * FROM images LIMIT " .$this_page_first_result . ',' . $results_per_page ;
    $result = $conn->prepare($sql);
    $result->execute();

    $i = 0;
    $com = "SELECT * From comments";
    $ans = $conn->prepare($com);
    $ans->execute();
    $comments = $ans->fetchAll();
    while($row = $result->fetch())
    {   
        $com = "SELECT * From likes where image_id=?";
        $ans = $conn->prepare($com);
        $ans->execute([$row['ID']]);
        $like = $ans->rowCount();
            echo "<form method = 'POST' action = '".SetComments($conn)."'>";
                echo "<div class = 'images'>";
                    echo "<td><img src ='{$row['image']}' class = 'gallery' value = '{$row['ID']}'></td>";
                    echo "<h2>comments</h2>";
                    foreach ($comments as $value)
					{   
                       if ($value['image_id'] === $row['ID']){
						echo("<div class='container_box' >
								<div style='color: black; text-align: center; font-size: 1vw;'>"."</div>
								<div style='font-size: 1.5vw;'>".$value['comment']."</div>
                            </div>");
                       }
                    }
                    echo "likes ".$like;
                    echo "<input type = 'hidden' name = 'image_id' value = '{$row['ID']}'>";
                    echo "<br>";
                    echo "<td value = '{$row['ID']}'><textarea name='comment_content'></textarea></td>";
                    echo "<br>";
                    echo "<button type : 'submit' name = 'commentSubmit' value = '{$row['ID']}'>comment</button>";
                    echo " ";
                    echo " ";        
                    echo "<button type : 'submit' name = 'like' value = '{$row['ID']}'>like</button>";
                    if (isset($_POST['like'])) 
                    {
                        break;
                    }  
                    echo "<br>";
                    if (isset($_POST['commentSubmit'])) 
                    {
                        break;
                    }
                    echo "<br>";

                echo"</div>";
            echo "</form>";
        echo "</tr>";
    }
    echo"<div class = 'pager'>";
    for ($page = 1; $page <= $number_of_pages; $page++)
    {
            echo '<td><a href = "gallery.php?page=' .$page .'">' .$page. '</a></td>';
    }
    echo"</div>";
?>
</div>
<center><h3><a href= "../index.php">main menu</a></h3></center>
</body>
</html>