<?php
require('pageBase.php');
require('functions/getTable.php');

$sales = getTable($con, $query, "WHERE `sale_cost` IS NOT NULL", "ORDER BY `sale_cost` ASC", "LIMIT 6");
?>

<sector id="face" class="radius inner-shadow pad20">
  <div id="#randProduct">
    <?php
    $query = "SELECT * FROM products ORDER BY RAND() LIMIT 1";
    $res = $con->query($query);
    $randProduct = $res->fetch_assoc();

    $query = "SELECT COUNT(*) 
        FROM `keys` 
        INNER JOIN `products`
        ON `keys`.`game` = `products`.`id`
        WHERE `keys`.`game` = " . $randProduct['id'];
    $res = $con->query($query);
    $get = $res->fetch_assoc();
    $randProduct['count'] = $get['COUNT(*)'];
    ?>
    <div class="sector-name">
      <h2>Случайный товар:<br><?= $randProduct['name'] ?></h2>
    </div>
    <a href="../product?id=<?= $randProduct['id'] ?>" id="bigPoster" title="<?= $randProduct['name'] ?>">
      <img src="../img/products/<?= $randProduct['image'] ?>" alt="<?= $randProduct['name'] ?>" class="radius mauto">
    </a>
  </div>
  <div id="products">
    <div class="sector-name">
      <h2>Скидки %</h2>
    </div>
    <div id="sales" class="inner-shadow pad10 radius mauto">
      <?php
      require("./functions/getCatalogue.php");
      getCatalogue($sales);
      ?>
    </div>
  </div>
</sector>


<?php
endPage();
?>