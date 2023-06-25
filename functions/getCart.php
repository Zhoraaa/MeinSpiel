<?php
function getCart($orders)
{
  $output = [
    "totalCost" => "0",
    "withoutSales" => "0",
  ];
  foreach ($orders as $order) {
    $minCost = ($order['sale_cost']) ?? $order['cost'];
    $output['totalCost'] = $output['totalCost'] + $minCost;
    $output['withoutSales'] = $output['withoutSales'] + $order['cost'];

    require("connect.php");
    $id = $order['game'];
    $query = "SELECT COUNT(*) 
  FROM `keys` 
  INNER JOIN `products`
  ON `keys`.`game` = `products`.`id`
  WHERE `keys`.`game` = $id";
    $res = $con->query($query);
    $get = $res->fetch_assoc();
    $order['count'] = $get['COUNT(*)'];

    $order['cost_str'] = $order['cost'] . " ₽";
    if ($order['cost'] > $order['sale_cost'] && $order['sale_cost'] != null) {
      $order['sale_percentage'] = round(100 - ($order['sale_cost'] / $order['cost'] * 100), 0);
      $order['cost_str'] = $order['sale_cost'] . "₽ <i>(" . $order['cost'] . " ₽) </i>
    <span class=\"sale-percentage gradient\">-" . $order['sale_percentage'] . "%</span>";
    }
?>
    <a href="../product.php?id=<?= $id ?>" class="product-card inner-shadow" title="<?= $order['name'] ?>">
      <div class="mini-poster">
        <img src="../img/products/<?= $order['image'] ?>" alt="<?= $order['name'] ?>">
      </div>
      <div class="pcard-info inner-shadow">
        <h3><?= $order['name'] ?></h3>
        <br>
        <span><?= $order['cost_str'] ?></span>
      </div>
    </a>
<?php
  }
    return $output;
}
