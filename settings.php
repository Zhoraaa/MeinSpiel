<?php
require('pageBase.php');
require("functions/getTable.php");
require "admin/security.php";
?>
<section class="flex column gap10">
    <form action="./functions/addData.php" class="radius inner-shadow pad20 flex column">
        <div class="flex mauto gap10" style="align-items: center;">
            <span>
                Добавить
            </span>
            <select name="table" id="">
                <option value disable selected>Что добавить?</option>
                <?php
                $tables = [
                    "activate_in" => "Магазин активации",
                    "developers" => "Разработчика",
                    "publishers" => "Издателя",
                    "os" => "OС",
                    "processor_models" => "Модель процессора",
                    "videomemory_vars" => "Модель видеокарты",
                ];

                foreach ($tables as $table => $show_text) {
                ?>
                    <option value="<?= $table ?>"><?= $show_text ?></option>
                <?php
                }
                ?>
            </select>
            <span>с названием</span>
            <input type="text" name="name" class="inner-shadow radius pad10" placeholder="Введите название" />
            <button class="radius white-border">Вперёд</button>
        </div>
    </form>

    <form action="admin/addKey.php" class="inner-shadow pad20 radius flex column gap10">
        <h1 class="ctrl-e">Добавление ключей</h1>
        <select name="id" class="ctrl-e pad10 mauto">
            <?php
            $products = getTable(null, null, null, null);
            foreach ($products as $product) {
                $selected = (isset($_GET['key']) && $_GET['key'] == $product['id']) ? "selected" : "null";
            ?>
                <option value="<?= $product['id'] ?>" <?= $selected ?>><?= $product['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <div class="mauto"><input type="text" name="key" class="inner-shadow pad10 radius ctrl-e" maxlength="16" minlength="16" placeholder="XXXXXXXXXXXXXXXX"></div>
        <div class="mauto btns wrap">
            <button class="white-border radius">Добавить</button>
            <a href="/" class="white-border radius">Назад</a>
        </div>
    </form>
    <div class="inner-shadow radius pad20 flex gap10 wrap">
        <?php
        $tables4list = [
            "activate_in" => "Магазины активации:",
            "developers" => "Разработчики:",
            "publishers" => "Издатели:",
            "os" => "OСи:",
            "processor_models" => "Модели процессоров:",
            "videomemory_vars" => "Модели видеокарт:",
        ];

        foreach ($tables4list as $tableName => $listName) {
        ?>
            <div class="flex column"> 
                <p class="block pad10 ctrl-e"><?= $listName ?></p>
                <div class="list white-border radius">
                    <?php
                    $table = getTable("SELECT * FROM `" . $tableName . "`", null, null, null);
                    foreach ($table as $tableStr) {
                    ?>
                        <div class="list-string inner-shadow radius pad10">
                            <div>
                                <span>
                                    <?= $tableStr['name'] ?>
                                </span>
                            </div>
                            <div class="tools">
                                <a href="./admin/delData.php?table=<?= $tableName ?>&id=<?= $tableStr['id'] ?>" title="удалить" class="to-default like-circle">×</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php
endPage();
