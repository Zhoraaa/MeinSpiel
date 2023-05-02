<?php
require_once('pageBase.php');
?>
 
<div class="inner-shadow radius" id="personal-area">
    <div id="avatar"><img src="../img/account.svg" alt=""> </div>
    <div id="info">
        <div><h2><?= $user['balance'] ?> ₽</h2><button class="radius inter fifaks">Пополнить баланс</button></div>
        <div><div class="inner-shadow radius fifaks pad"><?= $user['name_user'] ?></div><button class="radius inter fifaks">Редактировать</button></div>
        <div><div class="inner-shadow radius fifaks pad"><?= $user['email'] ?></div><a href="../user/logOut.php"><button class="radius inter fifaks">Выйти</button></a></div>
    </div>
</div>