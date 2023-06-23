<?php
require "connect.php";
$id = $_GET['id'];

$query = "SELECT * FROM `orders` WHERE `client` = '" . $_COOKIE['user'] . "' AND `game` = $id";
$res = $con->query($query);
$check = $res->fetch_assoc();
if (empty($check)) {
    $query = "INSERT INTO `orders`(`id`, `client`, `game`, `count`, `status`) VALUES (NULL,'" . $_COOKIE['user'] . "','$id','1','1')";
    $res = $con->query($query);
} else {
    $count = $check['count']+1;
    $query = "UPDATE `orders` SET `count`='$count' WHERE `id`=".$check['id'];
    $res = $con->query($query);
}

header("location: ../product.php?id=$id");
