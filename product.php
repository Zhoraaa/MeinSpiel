<?php
require_once('pageBase.php');

if ($user['role'] != 1 && !empty($_GET['productID']))
?>
<div id="productInfo" class="inner-shadow radius pad">
  <div>
    <img src="" alt="">
    <div>
      <h2>test</h2>
      <div>Издатель: </div>
      <div>Разработчик: </div>
      <div>Активация: </div>
      <div>Цена: </div>
      <div>Цена со скидкой: </div>
      <button class="pad radius white-border">В КОРЗИНУ</button>
    </div>
  </div>
  <div>
    <div class="inner-shadow radius pad marg ptInfo" id="desc"></div>
    <div class="inner-shadow radius pad marg ptInfo" id="sys"></div>
    <div class="inner-shadow radius pad marg ptInfo" id="requests"></div>
  </div>
</div>
<?php
endPage();
?>