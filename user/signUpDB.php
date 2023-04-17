<?php

// Подключение БД и сессии
include('../pageBase.php');
$_SESSION['result'] = "Регистрация прошла успешно";

// Запись в переменные для последующего SQL-запроса
$login = $_POST['login'];
$email = $_POST['email'];
$pass = ($_POST['pass'] == $_POST['passRep']) ? $_POST['pass'] : false;

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
        $res = $con->query("SELECT * FROM users");
        $check = mysqli_fetch_assoc($res);

        if ($check['login'] == $login) {
            $_SESSION['result'] = "Логин уже используется";
        } elseif ($check['email'] == $email) {
            $_SESSION['result'] = "Почта уже используется";
        } else {
            // Добавление пользователя. Всегда есть хотябы один админ.
            $query = "SELECT * FROM `users` WHERE role = 1";
            $res = $con->query($query);

            $role = (!empty($check == mysqli_fetch_all($res))) ? 2 : 1;

            $query = "INSERT INTO `users`
            (`id_user`, `name_user`, `password`, `balance`, `avatar`, `email`, `role`)
            VALUES
            (NULL, '$login', '$pass', '', 'default.png', '', '')
        (NULL, '', '$email', $phone, '$pass', NULL, '')";
            echo $query."<br>";
            $res = $con->query(($query));

            // Автоматический вход в аккаунт после регистрации
            $query = "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$pass';";
            echo $query;
            $res = $con->query($query);
            $user = mysqli_fetch_assoc($res);

            setcookie("user", $account['id'], time() + 3600 * 24, "/");

            $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $user['name'] . "!";
            header("Location: ../index.php");
        }
    }
}
header("location: signUp.php");
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
    <p><?= $query ?></p>
    <p><?= strlen($phone) ?></p>
</div>