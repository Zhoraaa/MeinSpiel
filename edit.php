<?php
require_once('pageBase.php');

if(!empty($_GET)){
    $newLogin = $_GET['newLogin'];
    $newEmail = $_GET['newEmail'];

    $query = "UPDATE `users` SET `name`= '$newLogin', `email`= '$newEmail' WHERE `users` . `id`= ".$user['id'];
    echo $query;
    $res = $con->query($query);
    header('location: /account');
}
?>
 
<form method="GET" class="inner-shadow radius" id="personal-area">
    <div id="avatar"><img src="../img/account.svg" alt=""> </div>
    <div id="info">
        <div><input name="newLogin" class="inner-shadow radius pad10" value="<?= $user['name'] ?>" placeholder="name"><a href="../account.php"><button type="button" class="radius white-border">Отмена</button></a></div>
        <div><input name="newEmail" class="inner-shadow radius pad10" value="<?= $user['email'] ?>" placeholder="email"><button type="submit" class="radius white-border">Сохранить</button></div>
    </div>
</form>

<?php
endPage();
?>