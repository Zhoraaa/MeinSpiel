<?php
require "../functions/connect.php";
$text = $_GET['text'];
$product = $_GET['product'];

$query = "INSERT INTO `reviews` 
(`id`, `product`, `author`, `created_at`, `text`) 
VALUES 
(NULL, '$product', '".$_COOKIE['user']."', '" . date("Y-m-d H:i:s") . "', '$text')";
$res = $con->query($query);

header("location: ../product.php?id=$product");