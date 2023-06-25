<?php
function getCatalogue($products)
{
  foreach ($products as $product) {

    require("connect.php");
    $id = $product['id'];
    $query = "SELECT COUNT(*) 
  FROM `keys` 
  INNER JOIN `products`
  ON `keys`.`game` = `products`.`id`
  WHERE `keys`.`game` = $id";
    $res = $con->query($query);
    $get = $res->fetch_assoc();
    $product['count'] = $get['COUNT(*)'];

    $product['cost_str'] = $product['cost'] . " ₽";
    if ($product['cost'] > $product['sale_cost'] && $product['sale_cost'] != null) {
      $product['sale_percentage'] = round(100 - ($product['sale_cost'] / $product['cost'] * 100), 0);
      $product['cost_str'] = $product['sale_cost'] . "₽ <i>(" . $product['cost'] . " ₽) </i>
    <span class=\"sale-percentage gradient\">-" . $product['sale_percentage'] . "%</span>";
    }
?>
    <a href="../product.php?id=<?= $id ?>" class="product-card inner-shadow" title="<?= $product['name'] ?>">
      <div class="mini-poster">
        <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
      </div>
      <div class="pcard-info inner-shadow">
        <h3><?= $product['name'] ?></h3>
        <br>
        <span><?= $product['cost_str'] ?></span>
      </div>
    </a>
<?php
  }
}
