<?php
    $DB_NAME = "camagru";
    $DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
    $DB_DSN1 = "mysql:host=localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "Obakeng";

    try {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>