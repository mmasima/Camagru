<?php
#!/usr/bin/php
include 'database.php';

// CREATE DATABASE
try {
    $conn = new PDO("mysql:host=$DB_DSN_LIGHT", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE camagru";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo "ERROR CREATING DATABASE: ".$e->getMessage()."Aborting process<br>";
    }

    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `verified` tinyint(1) NOT NULL DEFAULT '0',
            `token` varchar(255) DEFAULT NULL,
           
            PRIMARY KEY (`id`)
        )";
        $dbh->exec($sql);
        echo "Table USERS created successfully<br>";
    }
    catch (PDOException $e) {
        echo "ERROR CREATING USERS TABLE: ".$e->getMessage()."Aborting process<br>";
        }
?>