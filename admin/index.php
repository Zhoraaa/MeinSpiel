<?php
require_once("../pageBase.php");

if (!$user || $user['role'] != 1) {
  echo "<h1 class='warning'>Вы не администратор, покиньте эту страницу</h1>";
  // header("location: /");
} else {
?>
<div class="inner-shadow pad15">
  <div id="filters">asd</div>
  <div id="catalogue">
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
    <div class="product-card inner-shadow"></div>
  </div>
</div>
<?php
}
endPage()
?>