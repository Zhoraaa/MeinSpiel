<?php
require "pageBase.php";
require "functions/connect.php";

$query = "SELECT 
orders.id, 
orders.client,
orders.game,
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
<section class="radius inner-shadow pad20 flex column-reverse gap10">
    <div id="catalogue">
        <?php
        require("./functions/getCart.php");
        $cart = getCart($orders);

        if ($cart['totalCost'] == $cart['withoutSales']) {
            unset($cart['withoutSales']);
        }
        ?>
    </div>
    <div class="pcard-info inner-shadow">
        <h3><?= $order['name'] ?></h3>
        <br>
        <span><?= $product['costStr'] ?></span>
        <br>
    </div>
    <div id="totalCost">
        <h2>Итоговая цена: <?= $cart['totalCost'] ?> ₽
            <?php
            if (isset($cart['withoutSales'])) {
                $salePercentage = round(100 - ($cart['totalCost'] / $cart['withoutSales'] * 100), 1);
            ?>
                (Скидка <?= $salePercentage ?>%)
            <?php
            } ?>
        </h2>
        <?php
        if (isset($cart['withoutSales'])) {
        ?>
            <h2 class="translucent-text italic">
                Цена без скидок: <?= $cart['withoutSales'] ?> ₽
            </h2>
        <?php } ?>
        <div class="btns wrap">
            <a href="user/buy.php?cost=<?= $cart['totalCost'] ?>" class="radius white-border">Оплатить</a>
            <a href="user/clearCart.php" class="radius white-border">Очистить корзину</a>
        </div>
    </div>
</section>
<?php

endPage();
