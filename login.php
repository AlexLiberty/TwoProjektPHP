<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Авторизація</title>
</head>
<body>
<h1>Авторизація</h1>
<a class="button" href="index.php">На головну</a>
<form action="login.php" method="POST">
    <label for="login">Логін:</label><br>
    <input class="input" type="text" id="login" name="login" required><br>

    <label for="password">Пароль:</label><br>
    <input class="input" type="password" id="password" name="password" required><br>

    <label for="passwordcheck">Перевірка паролю:</label><br>
    <input class="input" type="password" id="passwordcheck" name="passwordcheck" required><br><br>


    <input class="addbutton" type="submit" value="Вхід">
</form>

<?php
if (isset($_POST['login'], $_POST['password'], $_POST['passwordcheck'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordcheck = $_POST['passwordcheck'];

    if ($password !== $passwordcheck) {
        echo "<p style='color: red;'>Паролі не співпадають!</p>";
        exit();
    }

    $userFile = 'users.txt';

    if (file_exists($userFile))
    {
        $users = file($userFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $isAuthenticated = false;

        foreach ($users as $user)
        {
            list($storedLogin, $storedPassword, $storedEmail) = explode(':', $user);

            if ($storedLogin === $login && password_verify($password, $storedPassword))
            {
                $isAuthenticated = true;
                break;
            }
        }

        if ($isAuthenticated)
        {
            echo "<p style='color: green;'>Ви успішно авторизувались</p>";
        }
        else
        {
            echo "<p style='color: red;'>Неправильний логін або пароль</p>";
        }
    }
    else
    {
        echo "<p style='color: red;'>Файл користувачів не знайдено</p>";
    }

    //header('Location: index.php');
}
?>

</body>
</html>