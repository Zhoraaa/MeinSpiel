<?php
require_once('pageBase.php');

if(!empty($_GET)){
    $newLogin = $_GET['newLogin'];
    $newEmail = $_GET['newEmail'];

    $query = "UPDATE `users` SET `name_user`= '$newLogin', `email`= '$newEmail' WHERE `users` . `id_user`= ".$user['id_user'];
    echo $query;
    $res = $con->query($query);
    header('location:account.php');
}
?>
 
<form method="GET" class="inner-shadow radius" id="personal-area">
    <div id="avatar"><img src="../img/account.svg" alt=""> </div>
    <div id="info">
        <div><input name="newLogin" class="inner-shadow radius pad" value="<?= $user['name_user'] ?>" placeholder="name"><a href="../account.php"><button type="button" class="radius white-border">Отмена</button></a></div>
        <div><input name="newEmail" class="inner-shadow radius pad" value="<?= $user['email'] ?>" placeholder="email"><button type="submit" class="radius white-border">Сохранить</button></div>
    </div>
</form>

<?php
endPage();
?>