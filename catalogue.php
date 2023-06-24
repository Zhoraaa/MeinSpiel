<?php
require_once("pageBase.php");
?>
<section class="radius inner-shadow content">
  <div id="filters">filters</div>
  <div id="catalogue">
    <?php if (isset($user) && $user['role'] == 1) { ?>
      <a href="../product.php" class="product-card inner-shadow">
        <img src="../img/plus.svg" alt="Добавить товар">
      </a>
    <?php }
    require("./functions/getTable.php");
    $query = "SELECT 
    products.id,
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
    
    FROM products 
    INNER JOIN publishers ON products.publisher = publishers.id 
    INNER JOIN developers ON products.developer = developers.id 
    INNER JOIN activate_in ON products.shop = activate_in.id 
    INNER JOIN os ON products.os = os.id 
    INNER JOIN processor_models ON products.processor = processor_models.id 
    INNER JOIN videomemory_vars ON products.videocard = videomemory_vars.id 
    INNER JOIN ram ON products.ram = ram.id";
    $products = getTable($query, $con);
    foreach ($products as $product) {
      $costStr = $product['cost'] . " ₽";
      if ($product['cost'] > $product['sale_cost'] && $product['sale_cost'] != null) {
        $product['sale_percentage'] = round(100 - ($product['sale_cost'] / $product['cost'] * 100), 0);
        $costStr = $product['sale_cost'] . "₽ <i>(" . $product['cost'] . " ₽) </i>
        <span class=\"sale-percentage gradient\">-" . $product['sale_percentage'] . "%</span>";
      }

    ?>
      <a href="../product.php?id=<?= $product['id'] ?>" class="product-card inner-shadow" title="<?= $product['name'] ?>">
        <div class="mini-poster">
          <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        </div>
        <div class="pcard-info inner-shadow">
          <h3><?= $product['name'] ?></h3>
          <br>
          <span><?= $costStr ?></span>
        </div>
      </a>
    <?php } ?>

  </div>
</section>
<?php
endPage()
?>