<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    //create the database
    $db = new PDO("mysql:host=$servername", $username, $password);
    //set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbname = "`".str_replace("`", "``", "todoapp")."`";
    $db->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $db->query("use $dbname");

    echo "Database created successfully<br>";
} catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

try{
    //create Users
    $createusers = "CREATE TABLE IF NOT EXISTS Users (
        user_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(15) NOT NULL
    )";

    //use exec() because no results are returned
    $db->exec($createusers);

}   catch (PDOException $e){
    echo $createusers . "<br>" . $e->getMessage();
}

try{
    //create Tasks
    $createtasks = "CREATE TABLE IF NOT EXISTS Tasks (
        task_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        task_name TEXT,
        user_id INT NOT NULL,
        FOREIGN KEY user_id(user_id)
        REFERENCES Users(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
        )";

    $db->exec($createtasks);

}   catch (PDOException $e){
    echo $createtasks . "<br>" . $e->getMessage();
}

try{
    //generate generic user in table Users
    $createuser1= "INSERT INTO Users (user_name)
        VALUES ('user1')";
    
    $db->exec($createuser1);
}   catch (PDOException $e){
    echo $createtasks . "<br>" . $e->getMessage();
}

header('Location: ../viewtasks.php');

?>