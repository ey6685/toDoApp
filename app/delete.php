<?php

require_once 'connect.php';

if(isset($_GET['as'], $_GET['task'])){
    $as     = $_GET['as'];
    $task   = $_GET['task'];

    $deleteQuery = $db->prepare("
        DELETE FROM tasks 
        WHERE task_id = :task
        AND user_id = :user    
    ");

    $deleteQuery->execute([
        'task' => $task,
        'user' => $_SESSION['user_id']
    ]);

}

header('Location: ../viewtasks.php');

?>