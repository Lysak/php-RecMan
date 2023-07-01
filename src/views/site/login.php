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
<h2>Авторизація</h2>
<form method="POST" action="/auth/login">
    <label>Email або телефон</label>
    <label>
        <input type="text" name="email_or_phone" required>
    </label><br><br>

    <label>Пароль</label>
    <label>
        <input type="password" name="password" required>
    </label><br><br>

    <input type="submit" value="Увійти">
</form>
</body>
</html>
