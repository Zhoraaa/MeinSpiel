<?php
require "../functions/connect.php";
require "user.php";

$query = "DELETE FROM `orders` WHERE `client` = '" . $user['id'] . "' AND `status` = 1";
$res = $con->query($query);

header("location: ../cart.php");