<?php

    include '../controller/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Gallery</title>
</head>
<style>
.gallery{
    width : 300px;
    height : 400px; 
}
</style>
<body>
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
    while($row = $result->fetch())
    {
        
        if ($i % 3 == 0)
        {
            echo "<tr>";
        }
        echo "<td><img src ='{$row['image']}' class = 'gallery'></td>";
        if ($i % 3 == 2)
        {
            echo "</tr>";
        }
        $i++;
    }
    for ($page = 1; $page <= $number_of_pages; $page++)
    {
        echo '<a href = "gallery.php?page=' .$page .'">' .$page. '</a>'; 
    }

?>
    <center><h3><a href= "../index.php">main menu</a></h3></center>
</body>
</html>