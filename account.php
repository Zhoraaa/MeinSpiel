<?php
require_once('pageBase.php');
?>
 
<div class="inner-shadow radius" id="personal-area">
    <div id="avatar"><img src="../img/account.svg" alt=""> </div>
    <div id="info">
        <div><h2><?= $user['balance'] ?> ₽</h2><a href="../" class="radius"><button class="radius white-border">Пополнить баланс</button</==></a></div>
        <div><div class="inner-shadow radius pad"><?= $user['name_user'] ?></div><a href="../edit.php"><button class="radius white-border">Редактировать</button></a></div>
        <div><div class="inner-shadow radius pad"><?= $user['email'] ?></div><a href="../user/logOut.php" class="radius"><button class="radius white-border">Выйти</button></a></div>
    </div>
</div>

<?php
endPage();
?>