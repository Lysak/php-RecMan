<?php

/**
 * @var array $data
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Форма авторизації</title>
</head>
<body>
<h2>Реєстрація</h2>
<form method="POST" action="/auth/signup">
    <label>Ім'я</label>
    <label>
        <input type="text" name="first_name" required>
    </label><br><br>

    <label>Прізвище</label>
    <label>
        <input type="text" name="last_name" required>
    </label><br><br>

    <label>Email</label>
    <label>
        <input type="email" name="email" required>
    </label><br><br>

    <label>Телефон</label>
    <label>
        <input type="tel" name="phone" required>
    </label><br><br>

    <label>Пароль</label>
    <label>
        <input type="password" name="password" required>
    </label><br><br>

    <input type="submit" value="Зареєструватися">
</form>
</body>
</html>
