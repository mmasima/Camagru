<?php
#!/usr/bin/php
include 'database.php';

// CREATE DATABASE
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $dbname";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo "ERROR CREATING DATABASE: ".$e->getMessage()."Aborting process<br>";
    }

    try {
        
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `users` (
            `PersonID` int(11) NOT NULL AUTO_INCREMENT,
            `user_name` varchar(100) NOT NULL,
            `user_email` varchar(100) NOT NULL,
            `user_password` varchar(255) NOT NULL,
            `verified` tinyint(1) DEFAULT '0',
            `token` varchar(255) DEFAULT NULL,
            `notify` tinyint(1) DEFAULT '1',
           
            PRIMARY KEY (`PersonID`)
        )";
        $dbh->exec($sql);
        echo "Table USERS created successfully<br>";
    }
    catch (PDOException $e) {
        echo "ERROR CREATING USERS TABLE: ".$e->getMessage()."Aborting process<br>";
        }

        //images table
        try {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE `images` (
                `ID` int(11) NOT NULL AUTO_INCREMENT,
                `image` VARCHAR(100) NOT NULL,
                `PersonID` int,
                FOREIGN KEY(PersonID) REFERENCES users(PersonID),

                PRIMARY KEY(`ID`)
                
            )";
            $dbh->exec($sql);
            echo "Table IMAGES created successfully<br>";
        } catch (PDOException $e) {
            echo "ERROR CREATING IMAGES TABLE: ".$e->getMessage()."Aborting process<br>";
        }
        try {
        
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE `comments` (
                `comment_id` int(11) NOT NULL AUTO_INCREMENT,
                `comment` varchar(200) NOT NULL,
                `image_id` int,
                `PersonID` int,

                FOREIGN KEY(PersonID) REFERENCES users(PersonID),
                FOREIGN KEY(image_id) REFERENCES images(ID),

                PRIMARY KEY(`comment_id`)
              )";
            $dbh->exec($sql);
            echo "Table COMMENTS created successfully<br>";
        } catch (PDOException $e) {
            echo "ERROR CREATING COMMENTS TABLE: ".$e->getMessage()."Aborting process<br>";
        }
        try {
        
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "CREATE TABLE `likes`(
			`like_id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`PersonID` INT,
			`image_id` INT,
            
			FOREIGN KEY(`image_id`) REFERENCES `images`(`ID`),
    		FOREIGN KEY(`PersonID`) REFERENCES `users`(`PersonID`)
        )";
         $dbh->exec($sql);
         echo "Table likes created successfully<br>";
        }catch (PDOException $e) {
            echo "ERROR CREATING likes TABLE: ".$e->getMessage()."Aborting process<br>";
        }
?>