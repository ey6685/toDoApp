<?php

require_once 'app/connect.php';

$tasksQuery = $db->prepare("
        SELECT task_id, task_name
        FROM tasks
        WHERE user_id = :user_id
");

$tasksQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$tasks = $tasksQuery->rowCount() ? $tasksQuery : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Tasks</title>
</head>
<body>
    <h1>Your Tasks</h1>

    <ul>
        <?php foreach($tasks as $task): ?>
            <li>
                <?php echo $task['task_name']; ?>
                <a href="app/delete.php?as=delete&task=<?php echo $task['task_id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <form action="app/add.php" method="post">
        <input type="text" name="task_name" placeholder="Type a new task here." class="submit">
        <input type="submit" value="Add" class="submit">
    </form>

    <form action="index.php">
        <input type="submit" value="Home">
    </form>
</body>
</html>