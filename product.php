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
      <div class="inner-shadow radius pad marg ptInfo" id="desc"></div>
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
?>
  <form action="" method="post" id="productInfo" class="inner-shadow radius pad">
    <div id="left-info">
      <div id="poster">
        <img src="../img/account.svg" alt="">
      </div>
      <div>
        <input type="text" class="inner-shadow radius pad">
        <div> <span>Издатель: </span> <span>1</span> </div>
        <div> <span>Разработчик: </span> <span>1</span> </div>
        <div> <span>Активация: </span> <span>1</span> </div>
        <div> <span>Цена: </span> <span>1</span> </div>
        <div> <span>Цена со скидкой: </span> <span>2</span> </div>
      </div>
      <button class="pad radius white-border">Сохранить</button>
    </div>
    <div id="right-info">
      <textarea class="inner-shadow radius pad marg ptInfo" id="desc" placeholder="Описание игры"></textarea>
      <div class="inner-shadow radius pad marg ptInfo" id="sys">
        <p>Минимальные системные требования:</p>
        <div> <span>OS: </span>
          <select name="" id="">
            <?php
            $query = "SELECT * FROM `os`";
            $res = $con->query($query);
            while ($OSs = mysqli_fetch_assoc($res)){
              ?>
              <option><?= $OSs['name_os'] ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div> <span>CPU: </span> 
          <select name="" id="">
            <?php
            $query = "SELECT * FROM `processor_models`";
            $res = $con->query($query);
            while ($CPU = mysqli_fetch_assoc($res)){
              ?>
              <option><?= $CPU['name_pmodel'] ?></option>
              <?php
            }
            ?>
          </select> </div>
        <div> <span>RAM: </span> <span>1</span> </div>
        <div> <span>GPU: </span> <span>1</span> </div>
        <div> <span>Место на диске: </span> <span>2</span> </div>
      </div>
      <div class="inner-shadow radius pad marg ptInfo" id="requests">
        <p class="half-text">Отзывов нет</p>
      </div>
    </div>
  </form>
<?php
}
endPage();
?>