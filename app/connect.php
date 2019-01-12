<?php

session start();

$_SESSION['user_id'] = 1;

$db = new PDO ('mysql:dbname=todoapp;host=localhost', 'root', '');

if(!isset($_SESSION['user_id'])){
    die('You are not connected.');
}

?>