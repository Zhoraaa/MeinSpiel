<?php
require "../functions/connect.php";
require "../user/user.php";
require "../admin/security.php";

if (empty($_GET['table'])) {
    $_SESSION['result'] = "Вы не выбрали, откуда удалять.";
} elseif (empty($_GET['id'])) {
    $_SESSION['result'] = "Вы не выбрали, что удалить.";
} else {
    $tables = [
        "activate_in" => "shop",
        "developers" => "developer",
        "publishers" => "publisher",
        "os" => "os",
        "processor_models" => "processor",
        "videomemory_vars" => "videocard"
    ];

    echo $query = "SELECT * FROM `products` WHERE `products`.`" . $tables[$_GET['table']] . "` =  '" . $_GET['id'] . "';";
    $res = $con->query($query);
    $check = $res->fetch_all(MYSQLI_ASSOC);
    if (!empty($check)) {
        $return = "Невозможно удалить, информация используется в товарах. (";
        foreach ($check as $product) {
            $return .= $product['name'] . ", ";
        }
        $return = substr($return, 0, -2) . ")";
        $_SESSION['result'] = $return;
    } else {
        $res = $con->query("DELETE FROM `" . $_GET['table'] . "` WHERE `id`='" . $_GET['id'] . "';");

        $_SESSION['result'] = "Удалено.";
    }
}
header('location: ../settings.php');
