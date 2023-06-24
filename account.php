<?php
require_once('pageBase.php');
?>

<div class="inner-shadow radius" id="personal-area">
    <div id="avatar"><img src="../img/account.svg" alt=""> </div>
    <div id="info" class="flex column gap10">
        <div>
            <h2 class="ctrl-r"><?= $user['balance'] ?> ₽</h2><a href="../balance.php" class="radius white-border">Пополнить баланс</a>
        </div>
        <div>
            <div class="inner-shadow pad10 radius"><?= $user['name'] ?></div><a href="../edit.php" class="radius white-border">Редактировать</a>
        </div>
        <div>
            <div class="inner-shadow pad10 radius"><?= $user['email'] ?></div><a href="../user/logOut.php" class="radius white-border">Выйти</a>
        </div>
    </div>
</div>

<?php
endPage();
?>