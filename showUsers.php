<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Користувачі</title>
</head>
<body>
<h1>Список користувачів</h1>
<a class="button" href="index.php">На головну</a>

<table class="user-table">
    <tr>
        <th>Логін</th>
        <th>Пароль</th>
        <th>Email</th>
    </tr>

    <?php
    $userFile = 'users.txt';

    if (file_exists($userFile))
    {
        $users = file($userFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user)
        {
            list($login, $password, $email) = explode(':', $user);
            echo "<tr><td>$login</td><td>$password</td><td>$email</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Користувачі відсутні</td></tr>";
    }

    ?>
</table>
</body>
</html>

