<?php
require "pageBase.php";
require "functions/connect.php";

$query = "SELECT 
orders.id, 
orders.client, 
orders.count, 
orders.status,
products.name, 
products.description, 
products.image, 
products.cost, 
products.sale_cost, 
products.memory, 
products.ssd, 
products.release_date, 
publishers.name AS publisher, 
developers.name AS developer, 
activate_in.name AS shop, 
os.name AS os, 
processor_models.name AS processor, 
videomemory_vars.name AS videocard, 
ram.name AS ram

FROM orders

INNER JOIN products ON orders.game = products.id
INNER JOIN publishers ON products.publisher = publishers.id 
INNER JOIN developers ON products.developer = developers.id 
INNER JOIN activate_in ON products.shop = activate_in.id 
INNER JOIN os ON products.os = os.id 
INNER JOIN processor_models ON products.processor = processor_models.id 
INNER JOIN videomemory_vars ON products.videocard = videomemory_vars.id 
INNER JOIN ram ON products.ram = ram.id

WHERE orders.client = " . $_COOKIE['user'] . " AND orders.status = 1";
$res = $con->query($query);
$orders = $res->fetch_all(MYSQLI_ASSOC);

?>
<section class="radius inner-shadow content">

    <div id="catalogue">
        <?php
        $totalCost = 0;
        $costWoutSales = 0;
        foreach ($orders as $order) {
            $minCost = (is_int($order['sale_cost'])) ? $order['sale_cost'] : $order['cost'];
            $totalCost = $totalCost + $minCost * $order['count'];

            $maxCost = $order['cost'];
            $costWoutSales = $maxCost * $order['count'];

            $costStr = $order['cost'] . " ₽";
            if ($order['cost'] > $order['sale_cost'] && $order['sale_cost'] != null) {
                $order['sale_percentage'] = round(100 - ($order['sale_cost'] / $order['cost'] * 100), 0);
                $costStr =
                    $order['sale_cost'] . "₽ <i>(" . $order['cost'] . " ₽) </i>
                 <span class=\"sale-percentage gradient\">-" .
                    $order['sale_percentage'] . "%</span>";
            }

        ?>
            <div class=" gap10">
                <a class="radius white-border pad10">-</a>
                <?= $order['count'] ?>
                <a class="radius white-border pad10">+</a>
            </div>
            <br>
            <a href="../product.php?id=<?= $order['id'] ?>" class="product-card inner-shadow" title="<?= $order['name'] ?>">
                <div class="mini-poster">
                    <img src="../img/products/<?= $order['image'] ?>" alt="<?= $order['name'] ?>">
                </div>
                <div class="pcard-info inner-shadow">
                    <h3><?= $order['name'] ?></h3>
                    <br>
                    <span><?= $costStr ?></span>
                    <br>
                </div>
            </a>
        <?php } ?>
    </div>
    <div id="totalCost">
        <h1>Итоговая цена: <?= $totalCost ?> ₽</h1>
    </div>
</section>
<?php

endPage();
