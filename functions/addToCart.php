<?php
require "connect.php";

if (!isset($_COOKIE['user'])) {
    $_SESSION['result'] = "Сначала авторизируйтесь!";
    exit();
    header("");
}

$query = "SELECT * FROM `carts`";
$res = $con->query($query);
$check = $res->fetch_assoc();

if (empty($check)) {
    $query = "INSERT INTO `carts` (`id`, `client`) VALUES (NULL, '" . $_COOKIE['user'] . "')";
    $res = $con->query($query);
}
