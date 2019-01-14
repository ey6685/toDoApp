<?php
require_once 'connect.php';

if(isset($_POST['task_name'])){
    $task_name = $_POST['task_name'];

    if(!empty($task_name)){
        $addedQuery = $db->prepare("
            INSERT INTO tasks (task_name, user_id)
            VALUES (:task_name, :user_id)
        ");

        $addedQuery->execute([
            'task_name' => $task_name,
            'user_id' => $_SESSION['user_id']
        ]);
    }
}

header('Location: ../viewtasks.php');

?>