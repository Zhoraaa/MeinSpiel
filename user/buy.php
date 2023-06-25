<?php
require "../functions/connect.php";
require "../user/user.php";
$cost = $_GET['cost'];
$newBalance = $user['balance'] - $cost;

function pay($con, $user, $newBalance)
{
  $query = "UPDATE `orders` SET `status`='2' WHERE `orders`.`client` = " . $user['id'];
  $res = $con->query($query);

  $query = "UPDATE `users` SET `balance` = '$newBalance' WHERE `users`.`id` = " . $user['id'];
  $res = $con->query($query);
  $_SESSION['result'] = "Оплачено.";
}

function sendLetter($con, $user, $cost)
{
  $to = $user['email'];
  $subject = "";
  $headers = [
    "From" => "MeinSpiel",
    "Content-Type" => "text/html; charset=utf-8;"
  ];

  $message = "<html><body>";
  $message .= file_get_contents("../sources/mail.html");

  require "../functions/getTable.php";
  $query = "SELECT 
  orders.id, 
  orders.client,
  orders.game,
  orders.count, 
  orders.status,
  products.name, 
  activate_in.name AS shop
  
  FROM orders
  
  INNER JOIN products ON orders.game = products.id 
  INNER JOIN activate_in ON products.shop = activate_in.id 
  
  WHERE orders.client = " . $user['id'] . " AND orders.status = 1";
  $paidOrders = getTable($query, null, null, null);

  foreach ($paidOrders as $paidOrder) {
    $query = "SELECT COUNT(*) 
    FROM `keys` 
    INNER JOIN `products`
    ON `keys`.`game` = `products`.`id`
    WHERE `keys`.`game` = " . $paidOrder['game'];
    $res = $con->query($query);
    $get = $res->fetch_assoc();
    $paidOrder['count'] = $get['COUNT(*)'];

    $query = "SELECT `key`
    FROM `keys`
    WHERE `keys`.`game` = " . $paidOrder['game'] . "
    LIMIT " . $paidOrder['count'];
    $res = $con->query($query);
    $keys = $res->fetch_all(MYSQLI_ASSOC);

    $message .= "
    <div>
      <div>
        <span> Ключ от игры " . $paidOrder['name'] . " (" . $paidOrder['count'] . "): </span><div class=\"keys\">
        ";

    foreach ($keys as $key) {
      $message .= "<p> " . $key['key'] . " </p>";
      $query = "DELETE FROM `keys` WHERE `keys`.`key` = '" . $key['key'] . "'";
      $res = $con->query($query);
    }

    $message .= "
      </div>
      </div>
      <div>
      <span> Магазин активации: </span>
      <span> " . $paidOrder['shop'] . " </span>
      </div>
    </div>";
  }

  $message .= "
  </div>
  <p>Обозначение заказчика в базе: " . $user['id'] . "</p>
  <p>Время выполнения заказа: " . date('Y-m-d H:i:s') . "</p>
  <p>Общая стоимость заказа: $cost ₽</p>";

  $message .= "</div></body></html>";
  mail($to, $subject, $message, $headers);
}

if (!$_GET['cost']) {
  $_SESSION['result'] = "Корзина пуста!";
} elseif ($newBalance >= 0) {
  sendLetter($con, $user, $cost);
  pay($con, $user, $newBalance);
  $_SESSION['result'] = "Заказ оформлен, проверьте свою почту.";
} else {
  $_SESSION['result'] = "Недостаточно средств. Не хватает " . $newBalance * -1 . " ₽.";
}


header("location: ../cart.php");
