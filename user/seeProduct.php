<div id="productInfo" class="inner-shadow radius">
  <div id="left-info">
    <div id="poster">
      <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    </div>
    <div id="summary-info">
      <h1><?= $product['name'] ?></h1>
      <div> <span>Издатель: </span> <span class="ctrl-r"><?= $product['publisher'] ?></span> </div>
      <div> <span>Разработчик: </span> <span class="ctrl-r"><?= $product['developer'] ?></span> </div>
      <div> <span>Активация: </span> <span class="ctrl-r"><?= $product['shop'] ?></span> </div>
      <div> <span>Дата релиза: </span> <span><?php echo date("d.m.Y", strtotime($product['release_date'])); ?></span> </div>
      <div>
        <span>Цена: </span>
        <span class="ctrl-r flex gap10"><?= $product['cost'] ?> ₽
          <?php if (isset($product['sale_percentage'])) { ?>
          <span class="sale-percentage gradient">-<?= $product['sale_percentage'] ?>%</span>
          <?php } ?>
        </span>
      </div>
      <?php
      if ($product['sale_cost'] < $product['cost'] && $product['sale_cost'] != null) {
      ?>
        <div> <span>Цена со скидкой: </span class="ctrl-r"> <span><?= $product['sale_cost'] ?> ₽</span> </div>
      <?php
      }
      ?>
      <div> <span>Количество оставшихся ключей: </span> <span class="ctrl-r"><?= $product['count'] ?></span> </div>
    </div>
    <div class="btns wrap wrap">
      <?php
      if (isset($_COOKIE['user']) && $user['role'] == 1) {
      ?>
        <a href="?id=<?= $id ?>&edit=true"><button class="pad10 radius white-border">Редактировать</button></a>
      <?php
      }
      ?>
      <a href="/user/addToCart.php?id=<?= $_GET['id'] ?>" class="radius white-border">В КОРЗИНУ</a>
      <a href="../catalogue.php" class="pad10 radius white-border">Назад</a>
    </div>
  </div>
  <div id="right-info">
    <div class="inner-shadow radius marg ptInfo pad20" id="desc">
      <?= $product['description'] ?>
    </div>
    <div class="inner-shadow radius pad20 marg ptInfo" id="sys">
      <h2>Минимальные системные требования</h2>
      <div> <span>OC: </span> <span><?= $product['os'] ?></span> </div>
      <div> <span>CPU: </span> <span><?= $product['processor'] ?></span> </div>
      <div> <span>GPU: </span> <span><?= $product['videocard'] ?></span> </div>
      <div> <span>ОЗУ: </span> <span><?= $product['ram'] ?></span> </div>
      <div> <span>Место на диске: </span> <span><?= $product['memory'] ?>ГБ</span> </div>
    </div>
    <div class="inner-shadow radius pad20 marg ptInfo" id="reviews">
      <?php
      if (isset($user)) {
      ?>
        <form action="/user/newReview.php" id="reviewForm">
          <textarea type="text" name="text" maxlength="256" title="Оставьте отзыв!" placeholder="Ваш отзыв..." class="inner-shadow radius pad10" required></textarea>
          <input type="text" name="product" class="hide" value="<?= $_GET['id'] ?>">
          <button class="white-border radius">Оставить отзыв</button>
          <hr>
        </form>
      <?php }
      include "./functions/connect.php";
      include "./functions/getReviews.php";
      ?>

    </div>
  </div>
</div>