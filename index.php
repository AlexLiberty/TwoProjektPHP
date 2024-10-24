<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Меню</title>
</head>
<body>
<h1>Меню</h1>
    <a class="button" href="addUser.php">Додати користувача</a><br>
    <a class="button" href="login.php">Авторизація</a><br>
    <a class="button" href="showUsers.php">Переглянути</a><br>

<?php
$userFile = 'users.txt';
if (file_exists($userFile))
{
    $users = file($userFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<p>Кількість користувачів: " . count($users) . "</p>";
}
else
{
    echo "<p>Кількість користувачів: 0</p>";
}
?>
</body>
</html>
