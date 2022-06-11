<?php
require_once __DIR__ . '/../config/dbConnect.php';
$db = new \config\dbConnect();

$users = $db->getAllUsers();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usersToDelete = array();

    foreach($_POST['delete_row'] as $selected){
        $usersToDelete[] = $selected;
    }

    $db->deleteUser($usersToDelete);
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Удалить пользователя</title>
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
<form method="post">
    <table border = 1>
    <?php if(!empty($users)):?>

            <tr>
                <th>id</th>
                <th>name</th>
                <th>surname</th>
                <th>age</th>
                <th>email</th>
                <th>delete</th>
            </tr>
            <?php foreach ($users as $user):?>
                <tr>
                    <td><?= $user['id']?></td>
                    <td><?= $user['name']?></td>
                    <td><?= $user['surname']?></td>
                    <td><?= $user['age']?></td>
                    <td><?= $user['email']?></td>
                    <td><label><input type='checkbox' name='delete_row[]' value="<?= $user['id']?>"></label></td>
                </tr>
            <?php endforeach;?>
    </table>
    <label>
    <input type='submit' value='Удалить выбранных пользователей'>
    </label><br>
</form>
<?php else:?>
    <p>Записей нет</p>
<?php endif;?>
</body>
</html>
