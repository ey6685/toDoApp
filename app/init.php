<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    //create the database
    $conn = new PDO("mysql:host=$servername", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbname = "`".str_replace("`", "``", "todoapp")."`";
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->query("use $dbname");

    echo "Database created successfully<br>";
} catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

try{
    //create tables
    $createuser = "CREATE TABLE IF NOT EXISTS User (
        user_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(15) NOT NULL
    )";

    //use exec() because no results are returned
    $conn->exec($createuser);

}   catch (PDOException $e){
    echo $createuser . "<br>" . $e->getMessage();
}

try{
    //create Tasks
    $createtasks = "CREATE TABLE IF NOT EXISTS Tasks (
        task_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        task_name VARCHAR(30) NOT NULL,
        task_owner INT NOT NULL,
        FOREIGN KEY user_id(task_owner)
        REFERENCES User(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
        )";

    $conn->exec($createtasks);

}   catch (PDOException $e){
    echo $createtasks . "<br>" . $e->getMessage();
}

try{
    //create Descriptions
    $createdescriptions = "CREATE TABLE IF NOT EXISTS Descriptions (
        description_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        task_id INT(6) NOT NULL,
        FOREIGN KEY task_id(task_id)
        REFERENCES Tasks(task_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
        DESCRIPTION TEXT
        )";

    $conn->exec($createdescriptions);
    
}   catch (PDOException $e){
    echo $createdescriptions . "<br>" . $e->getMessage();
}

?>