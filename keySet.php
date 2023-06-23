<?php
require("pageBase.php");
?>
<form action="../admin/addKey.php" class="inner-shadow pad20 radius flex column gap10">
    <h1 class="ctrl-e">Добавление ключей</h1>
    <select name="id" class="ctrl-e pad10 mauto">
        <?php
        require("functions/getProducts.php");
        foreach ($products as $product) {
            ?>
            <option value="<?=$product['id']?>"><?=$product['name']?></option>
            <?php
        }
        ?>
    </select>
    <div class="mauto"><input type="text" name="key" class="inner-shadow pad10 radius ctrl-e" maxlength="16" minlength="16" placeholder="XXXXXXXXXXXXXXXX"></div>
    <div class="mauto">
        <button class="white-border radius">Добавить</button>
        <a href="/" class="white-border radius">Назад</a>
    </div>
</form>
<?php
endPage();