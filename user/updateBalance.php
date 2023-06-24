<?php
require "connect.php";
$sum = $_GET['for'];

$query = "UPDATE `users` SET `balance`= `balance` + '$sum' WHERE id = " . $_COOKIE['user'];
$res = $con->query($query);
$_SESSION['result'] = "Баланс пополнен!";

header("location: /balance.php");