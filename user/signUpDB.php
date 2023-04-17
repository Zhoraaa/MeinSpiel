<?php
// Подключение БД и сессии
require_once('../pageBase.php');
$_SESSION['result'] = "Регистрация не была завершена по неизвестной ошибке";

// Запись в переменные для последующего SQL-запроса
$login = $_GET['login'];
$email = $_GET['email'];
$pass = ($_GET['pass'] == $_GET['passRep']) ? $_GET['pass'] : false;

// Защита от дурака, отключившего JS
if (!$login) {
    $_SESSION['result'] = "Введите логин (от 6 до 32 символов, латиница и цифры)";
} elseif (!$email) {
    $_SESSION['result'] = "Введите почту";
} elseif (!$pass) {
    $_SESSION['result'] = "Пароли не совпадают";
} else {

    // Проверка длинны логина, пароля 
    if (strlen($login) < 6 && strlen($login) > 32) {
        $_SESSION['result'] = "Некорректный логин (от 6 до 32 символов)";
    } elseif (strlen($pass) < 6 && strlen($pass) > 32) {
        $_SESSION['result'] = "Некорректный пароль (от 6 до 32 символов)";
    } else {

        // Проверка логина, почты и телефона на уникальность
        $res = $con->query("SELECT * FROM users WHERE `name_user`='$login'");
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

            $role = (!empty($check == mysqli_fetch_all($res))) ? 1 : 2;

            $query = "INSERT INTO `users`
            (`id_user`, `name_user`, `password`, `balance`, `avatar`, `email`, `role`)
            VALUES
            (NULL, '$login', '$pass', '0', 'default.png', '$email', '$role')";
            
            $res = $con->query(($query));

            // Автоматический вход в аккаунт после регистрации
            $query = "SELECT * FROM `users` WHERE `name_user`='$login' AND `password`='$pass';";
            
            $res = $con->query($query);
            $account = mysqli_fetch_assoc($res);

            setcookie("user", $account['id_user'], time() + 3600 * 24, "/");

            $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $account['name_user'] . "!";
        }
    }
}
header("location: /");
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
    <p><?= $query ?></p>
</div>