<?php

require_once 'app/connect.php';

$usersQuery = $db->prepare("
        SELECT user_id, user_name
        FROM Users
");

$usersQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$users = $usersQuery->rowCount() ? $usersQuery : [];

foreach($users as $user){
    echo $user['user_name'], '<br>';
}

?>

<title>View Lists</title>
<body>
<h1>View Lists</title>
<table border ="1">
<tr>
<td>User ID</td>
<td>User Name</td>
</tr>
<?php if(!empty($users)): ?>
<tr>
    <?php foreach($users as $user): ?>
        <td>
            <?php echo $user['user_id']; ?>
        </td>
        <td>
            <?php echo $user['user_name']; ?>
        </td>
<?php endforeach; ?>
</tr>
<?php else: ?>
    <p>You haven't added any items yet.</p>
<?php endif; ?>
</body>
