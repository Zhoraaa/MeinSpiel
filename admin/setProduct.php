<form action="" method="post" id="productInfo" class="inner-shadow radius pad10">
  <div id="left-info">
    <div id="poster">
      <img src="../img/account.svg" alt="">
    </div>
    <div id="summary-info">
      <textarea id="titleProduct" class="inner-shadow radius pad10"></textarea>
      <div>
        <span>Издатель: </span>
        <select name="publisher" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `publishers`";
          $res = $con->query($query);
          $publishers = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($publishers as $publisher) {
          ?>
            <option value="<?= $publisher['id'] ?>"><?= $publisher['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Разработчик: </span>
        <select name="publisher" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `developers`";
          $res = $con->query($query);
          $devs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($devs as $dev) {
          ?>
            <option value="<?= $dev['id'] ?>"><?= $dev['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Активация: </span>
        <select name="publisher" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `activate_in`";
          $res = $con->query($query);
          $shops = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($shops as $shop) {
          ?>
            <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Цена: </span>
        <input type="number" placeholder="₽" class="inner-shadow radius ctrl-r" min="0" class="cost" name="cost" />
      </div>
      <div>
        <span>Цена со скидкой: </span>
        <input type="number" placeholder="₽" class="inner-shadow radius ctrl-r" min="0" class="cost" name="sale-cost" />
      </div>
    </div>
    <button class="pad10 radius white-border">Сохранить</button>
  </div>
  <div id="right-info">
    <textarea class="inner-shadow radius pad10 marg ptInfo" id="desc" placeholder="Описание игры"></textarea>
    <div class="inner-shadow radius pad10 marg ptInfo" id="sys">
      <p>Минимальные системные требования:</p>
      <div>
        <span>OS: </span>
        <select name="OS" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `os`";
          $res = $con->query($query);
          $OSs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($OSs as $OS) {
          ?>
            <option value="<?= $OS['id'] ?>"><?= $OS['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>CPU: </span>
        <select name="CPU" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `processor_models`";
          $res = $con->query($query);
          $CPUs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($CPUs as $CPU) {
          ?>
            <option value="<?= $CPU['id'] ?>"><?= $CPU['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>RAM: </span>
        <select name="RAM" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `ram`";
          $res = $con->query($query);
          $RAMs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($RAMs as $RAM) {
          ?>
            <option value="<?= $RAM['id'] ?>"><?= $RAM['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>GPU: </span>
        <select name="GPU" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `videomemory_vars`";
          $res = $con->query($query);
          $GPUs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($GPUs as $GPU) {
          ?>
            <option value="<?= $GPU['id'] ?>"><?= $GPU['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Место на диске (ГБ): </span>
        <div>
          <input type="number" name="memory"  placeholder="ГБ" class="inner-shadow ctrl-r radius" min="0" />
          <label for="SSD">
            <input type="checkbox" name="SSD" id="SSD">
            <span>Рекомендован SSD.</span>
          </label>
        </div>
      </div>
    </div>
    <div class="inner-shadow radius pad10 marg ptInfo" id="requests">
      <p class="half-text">Отзывов нет</p>
    </div>
  </div>
</form>