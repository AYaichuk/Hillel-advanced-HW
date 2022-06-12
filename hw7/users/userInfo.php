<?php
require_once __DIR__ . '/../config/dbConnect.php';
$db = new \config\dbConnect();

$id_user = $_GET['id'];
$user = $db->getUserId($id_user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
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
<table border = 1>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>surname</th>
        <th>age</th>
        <th>email</th>
    </tr>
    <tr>
        <td><?= $user['id']?></td>
        <td><?= $user['name']?></td>
        <td><?= $user['surname']?></td>
        <td><?= $user['age']?></td>
        <td><?= $user['email']?></td>
    </tr>
</table>
</body>
</html>
