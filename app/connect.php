<?php

session_start();

try{
    $_SESSION['user_id'] = 1;

    $db = new PDO ('mysql:dbname=todoapp;host=localhost', 'root', '');

    if(!isset($_SESSION['user_id'])){
        die('You are not connected.');
    }

} catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

?>