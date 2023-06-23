<?php
// Подключение БД и сессии
require_once("../functions/connect.php");
$_SESSION['result'] = "Регистрация не была завершена по неизвестной ошибке";

// Запись в переменные для последующего SQL-запроса
$login = $_GET['login'];
$email = $_GET['email'];
$pass = ($_GET['pass'] == $_GET['passRep']) ? $_GET['pass'] : false;

// Защита от дурака, отключившего JS
if (!$login || mb_strlen($login) < 6 || mb_strlen($login) > 32) {
    $_SESSION['result'] = "Введите корректный логин (от 6 до 32 символов, латиница и цифры)";
} elseif (!$email) {
    $_SESSION['result'] = "Введите почту";
} elseif (!$pass || mb_strlen($pass) < 6 || mb_strlen($pass) > 32) {
    $_SESSION['result'] = "Пароли корректный пароль (от 6 до 32 символов, латиница и цифры)";
} else {
    // Проверка логина, почты и телефона на уникальность
    $res = $con->query("SELECT * FROM users WHERE `name`='$login'");
    $checkLogin = mysqli_fetch_assoc($res);
    $res = $con->query("SELECT * FROM users WHERE `email`='$email'");
    $checkEmail = mysqli_fetch_assoc($res);

    if ($checkLogin) {
        $_SESSION['result'] = "Логин уже используется";
    } elseif ($checkEmail) {
        $_SESSION['result'] = "Почта уже используется";
    } else {
        // Добавление пользователя. Всегда есть хотябы один админ.
        $query = "SELECT * FROM `users` WHERE role = 1";
        $res = $con->query($query);
        $check == $res->fetch_all(MYSQLI_ASSOC);
        $role = (!empty($check)) ? 1 : 2;

        $query = "INSERT INTO `users`
            (`id`, `name`, `password`, `balance`, `avatar`, `email`, `role`)
            VALUES
            (NULL, '$login', '$pass', '0', 'default.png', '$email', '$role')";

        $res = $con->query(($query));

        // Автоматический вход в аккаунт после регистрации
        include "signInDB.php";

        $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $account['name'] . "!";
    }
}
header("location: /");
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
</div>