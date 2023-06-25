<?php
require("../functions/connect.php");
$query = "SELECT * FROM `keys` WHERE `key` = '" . $_GET['key'] . "'";
$res = $con->query($query);
$check = $res->fetch_assoc();
if (!$_GET['key']) {
    $_SESSION['result'] = "Ключ не вписан!";
}
if ($check['key'] != $_GET['key']) {
    $query = "INSERT INTO `keys`(`id`, `key`, `game`) VALUES (NULL,'" . $_GET['key'] . "','" . $_GET['id'] . "')";
    $res = $con->query($query);
    $_SESSION['result'] = "Ключ добавлен.";
} else {
    $_SESSION['result'] = "Ключ не уникален для этого товара.";
}
header("location: /keySet.php?id=" . $_GET['id']);
