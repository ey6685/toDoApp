<?php
require_once 'app/connect.php';

$itemsQuery = $db->prepare("
        SELECT task_id, task_name
        FROM tasks
        WHERE user_id = :user_id
");

$itemsQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

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
        <?php foreach($items as $item){
            echo '<li>', $item['task_name'], '</li>';
        }?>
    </ul>

    <form action="app/add.php" method="post">
        <input type="text" name="task_name" placeholder="Type a new task here." class="submit">
        <input type="submit" value="Add" class="submit">
    </form>
</body>
</html>