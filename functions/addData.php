<?php
require "connect.php";
if (empty($_GET['table'])) {
    $_SESSION['result'] = "Вы не выбрали, что добавить.";
} elseif (empty($_GET['name'])) {
    $_SESSION['result'] = "Вы не вписали значение.";
} else {
    $tables = [
        "activate_in" => "Магазин активации",
        "developers" => "Разработчик",
        "publishers" => "Издатель",
        "os" => "OС",
        "processor_models" => "Модель процессора",
        "videomemory_vars" => "Модель видеокарты",
    ];

    $res = $con->query("SELECT * FROM `" . $_GET['table'] . "` WHERE `name` =  '" . $_GET['name'] . "';");
    $check = $res->fetch_assoc();
    if (!empty($check)) {
        $_SESSION['result'] = $tables[$_GET['table']] . " с таким названием уже содержится в базе данных!";
    } else {
        $res = $con->query("INSERT INTO `" . $_GET['table'] . "` (`id`, `name`) VALUES (NULL, '" . $_GET['name'] . "');");

        $_SESSION['result'] = $tables[$_GET['table']] . " \"" . $_GET['name'] . "\" теперь содержится в базе данных!";
    }
}
header('location: ../settings.php');
