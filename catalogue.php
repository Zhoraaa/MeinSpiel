<?php
require_once("pageBase.php");
?>
<div class="inner-shadow pad15">
  <div id="filters">asd</div>
  <div id="catalogue">
    <?php if ($user['role'] == 1) { ?>
      <a href="../product.php" class="product-card inner-shadow">
        <img src="../img/plus.svg" alt="Добавить товар">
      </a>
    <?php } ?>
  </div>
</div>
<?php
endPage()
?>