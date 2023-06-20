
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
        <div>
          <span>OS: </span>
          <select name="OS" id="">
            <?php
            $query = "SELECT * FROM `os`";
            $res = $con->query($query);
            $OSs = $res->fetch_all(MYSQLI_ASSOC);
            foreach ($OSs as $OS) {
            ?>
              <option><?= $OS['name_os'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <span>CPU: </span>
          <select name="CPU" id="">
            <?php
            $query = "SELECT * FROM `processor_models`";
            $res = $con->query($query);
            $CPUs = $res->fetch_all(MYSQLI_ASSOC);
            foreach ($CPUs as $CPU) {
            ?>
              <option><?= $CPU['name_pmodel'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <span>RAM: </span>
          <select name="RAM" id="">
            <?php
            $query = "SELECT * FROM `ram`";
            $res = $con->query($query);
            $RAMs = $res->fetch_all(MYSQLI_ASSOC);
            foreach ($RAMs as $RAM) {
            ?>
              <option><?= $RAM['name_ram'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <span>GPU: </span>
          <select name="GPU" id="">
            <?php
            $query = "SELECT * FROM `videomemory_vars`";
            $res = $con->query($query);
            $GPUs = $res->fetch_all(MYSQLI_ASSOC);
            foreach ($GPUs as $GPU) {
            ?>
              <option><?= $GPU['name_vmv'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <span>Место на диске (ГБ): </span>
          <div>
            <input type="number" name="memory" class="inner-shadow  radius" />
            <label for="SSD">
              <input type="checkbox" name="SSD" id="SSD">
              <span>Рекомендован SSD.</span>
            </label>
          </div>
        </div>
      </div>
      <div class="inner-shadow radius pad marg ptInfo" id="requests">
        <p class="half-text">Отзывов нет</p>
      </div>
    </div>
  </form>