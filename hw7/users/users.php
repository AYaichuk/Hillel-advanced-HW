<?php
require_once __DIR__ . '/../config/dbConnect.php';
$db = new \config\dbConnect();

$users = $db->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Показать всех пользователей</title>
</head>
<body>
<table border = 1>
    <tr>
        <th><a href="index.php">Главная</a></th>
        <th><a href="create.php">Добавить нового пользователя</a></th>
        <th><a href="users.php">Показать всех пользователей</a></th>
        <th><a href="delete.php">Удалить пользователя</a></th>
    </tr>
</table>
<br>
<?php if(!empty($users)):?>
    <?php foreach ($users as $user):?>
        <a href="userInfo.php?id=<?=$user['id']?>">ID = <?=$user['id']?> </a><br>
    <?php endforeach;?>
<?php else:?>
    <p>Пользователей не существует</p>
<?php endif;?>
