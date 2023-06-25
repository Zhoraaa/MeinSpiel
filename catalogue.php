<?php
require_once("pageBase.php");
?>
<section class="radius inner-shadow pad20">
  <div id="filters">filters</div>
  <div id="catalogue">
    <?php if (isset($user) && $user['role'] == 1) { ?>
      <a href="../product.php" class="product-card inner-shadow">
        <img src="../img/plus.svg" alt="Добавить товар">
      </a>
    <?php }
    require("./functions/getTable.php");
    $products = getTable($con, null, null, null, null);
    require("./functions/getCatalogue.php");
    getCatalogue($products);
    ?>

  </div>
</section>
<?php
endPage()
?>