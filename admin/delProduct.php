<?php
require "../functions/connect.php";
require "../functions/user.php";
require "../admin/security.php";
$id = $_SESSION['potential_delete'];

if (empty($id)) {
    $_SESSION['result'] = "А что удалять то?";
} else {
    $res = $con->query("DELETE FROM `keys` WHERE `game` = '$id'");
    $res = $con->query("DELETE FROM `reviews` WHERE `product` = '$id'");
    $res = $con->query("DELETE FROM `orders` WHERE `game` = '$id'");
    $res = $con->query("DELETE FROM `products` WHERE `id` = '$id'");
    $_SESSION['result'] = "Товар удалён.";
    unset($_SESSION['potential_delete']);
}
header("location: ../catalogue.php");