<?php
require_once('pageBase.php');

if ($user['role'] != 1 && !empty($_GET['productID'])) {
?>
  <div id="productInfo" class="inner-shadow radius pad">
    <div id="left-info">
      <div id="poster">
        <img src="../img/account.svg" alt="">
      </div>
      <div>
        <h2>test</h2>
        <div> <span>Издатель: </span> <span>1</span> </div>
        <div> <span>Разработчик: </span> <span>1</span> </div>
        <div> <span>Активация: </span> <span>1</span> </div>
        <div> <span>Цена: </span> <span>1</span> </div>
        <div> <span>Цена со скидкой: </span> <span>2</span> </div>
      </div>
      <button class="pad radius white-border">В КОРЗИНУ</button>
    </div>
    <div id="right-info">
      <div class="inner-shadow radius marg ptInfo" id="desc"></div>
      <div class="inner-shadow radius pad marg ptInfo" id="sys">
        <h2>Минимальные системные требования</h2>
        <div> <span>Издатель: </span> <span>1</span> </div>
        <div> <span>Разработчик: </span> <span>1</span> </div>
        <div> <span>Активация: </span> <span>1</span> </div>
        <div> <span>Цена: </span> <span>1</span> </div>
        <div> <span>Цена со скидкой: </span> <span>2</span> </div>
      </div>
      <div class="inner-shadow radius pad marg ptInfo" id="requests"></div>
    </div>
  </div>
<?php
} elseif ($user['role'] == 1) {
  include "admin/setproduct.php";
}
endPage();
?>