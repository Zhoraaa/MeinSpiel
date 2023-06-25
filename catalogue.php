<?php
require_once("pageBase.php");
require("./functions/getTable.php");
?>
<section class="radius inner-shadow pad20">
  <div id="filters">
    <?php
    require "./functions/filters.php";
    getFilters();
    ?>
  </div>
  <div id="catalogue">
    <?php if (isset($user) && $user['role'] == 1) { ?>
      <a href="../product.php" class="product-card inner-shadow">
        <img src="../img/plus.svg" alt="Добавить товар">
      </a>
    <?php }
    $queryConcat = applyFilters();

    $products = getTable(null, ($queryConcat['where']) ?? null, $queryConcat['sortBy'], null);
    if (!empty($products)) {
      require("./functions/getCatalogue.php");
      getCatalogue($products);
    }
    ?>

  </div>
</section>
<?php
endPage()
?>