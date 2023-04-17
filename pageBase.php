<?php
$con = mysqli_connect('localhost', 'root', '', 'mein_spiel');
session_start();
$return = $_SESSION['result'] ?? null;

$nav = [
  'catalogue' => 'Каталог',
  'korzina' => 'Корзина',
  'account' => 'Аккаунт'
];

$user = ($_COOKIE['user']) ?? null;
if ($user) {
$query = "SELECT * FROM `users` WHERE `id_user`='$user'";
$res = $con->query($query);
$user = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeinSpiel</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../font/inter.css">
  <link rel="stylesheet" href="../font/pixel-font.css  ">
  <link rel="shortcut icon" href="../img/logo.svg" type="image/x-icon">
</head>

<body>
  <content>

    <div id="account" class="radius">
      <img src="../img/logo.svg" alt="">

      <form action="../user/signInDB.php" method="get" id="signIn">
        <div><input type="text" name="login" placeholder="Логин" class="inner-shadow"></div>
        <div><input type="password" name="pass" placeholder="Пароль" class="inner-shadow"></div>
        <button type="submit">Войти</button>
        <div><a href="">Регистрация</a></div>
      </form>

      <form action="../user/signUpDB.php" method="get" id="signUp">
        <div><input type="text" name="login" placeholder="Логин" class="inner-shadow"></div>
        <div><input type="email" name="email" placeholder="Эл. почта" class="inner-shadow"></div>
        <div><input type="password" name="pass" placeholder="Пароль" class="inner-shadow"></div>
        <div><input type="password" name="passRep" placeholder="Повтор пароля" class="inner-shadow"></div>
        <button type="submit">Регистрация</button>
        <div><a href="">Вход</a></div>
      </form>
    </div>

    <header>
      <a class="title inner-header" href="/" title="На главную">
        <img src="../img/logo.svg" class="LOGO">
        <h1>Mein<br>Spiel</h1>
      </a>
      <form class="search inner-header">
        <input type="text" name="searchQuery" placeholder="Поиск">
        <button><img src="../img/Search.svg" alt="Искать"></button>
      </form>
      <nav class="inner-header">
        <?php
        if (isset($user)) {
        ?>
          <h2>
            <?= $user['balance'] ?> ₽
          </h2>
        <?php
        }
        ?>
        <div>
          <?php
          foreach ($nav as $item => $title) {
            if (isset($user)) {
          ?>
              <a href="<?= $item ?>.php" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } elseif ($item != 'account') { ?>
              <a href="<?= $item ?>.php" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } else {
            ?>
              <a onclick="hideSwitcher(<?= $item ?>)" id="loginBtn" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
          <?php
            }
          }
          ?>
        </div>
      </nav>
    </header>
    <section>
      <!-- Контентная область -->
      <?php
      function endPage()
      {
      ?>

    </section>
  </content>

  <footer class="wrapper">
    <img src="./img/mountains.svg">
    <div class="info"></div>
    <div class="spacer"></div>
  </footer>

</body>

</html>
<?php
        unset($return);
      }
?>