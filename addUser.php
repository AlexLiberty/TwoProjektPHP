<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Додавання користувачів</title>
</head>
<body>
<h1>Додати користувача</h1>
<a class="button" href="index.php">На головну</a>
<form action="addUser.php" method="POST">
    <label for="login">Логін:</label><br>
    <input class="input" type="text" id="login" name="login" required><br>

    <label for="email">Email:</label><br>
    <input class="input" type="email" id="email" name="email" required><br>

    <label for="password">Пароль:</label><br>
    <input class="input" type="password" id="password" name="password" required><br><br>


    <input class="addbutton" type="submit" value="Додати користувача">
</form>

<?php
if (isset($_POST['login'], $_POST['password'], $_POST['email']))  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    function addUser($userData) {
        $userFile = 'users.txt';
        file_put_contents($userFile, $userData . PHP_EOL, FILE_APPEND);
    }

    $userFile = 'users.txt';
    $users = file_exists($userFile) ? file($userFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

    $loginExists = false;
    foreach ($users as $user) {
        $userDetails = explode(':', $user);
        if ($userDetails[0] === $login) {
            $loginExists = true;
            break;
        }
    }

    if ($loginExists)
    {
        echo "<p style='color: red;'>Користувач з таким логіном вже існує</p>";
    }
    else
    {
        $userData = "$login:$password:$email";
        addUser($userData);
        echo "<p style='color: green;'>Користувача успішно додано</p>";
    }
}
?>
</body>
</html>
