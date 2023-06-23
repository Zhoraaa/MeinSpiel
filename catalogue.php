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
    $query = "SELECT * FROM `products`";
    $res = $con->query($query);
    $products = $res->fetch_all(MYSQLI_ASSOC);
    foreach ($products as $product) {
    ?>
      <a href="../product.php?id=<?= $product['id'] ?>" class="product-card inner-shadow" title="<?= $product['name'] ?>">
        <div class="mini-poster">
          <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        </div>
        <div class="pcard-info inner-shadow">
          <h3><?= $product['name'] ?></h3>
          <br>
          <p><?= $product['cost'] ?> ₽</p>
        </div>
      </a>
    <?php } ?>

  </div>
</section>
<?php
endPage()
?>