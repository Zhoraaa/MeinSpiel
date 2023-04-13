<?php
// $con = mysqli_connect('localhost', 'root', '', 'mein_spiel');
session_start();
$return = $_SESSION['return'];

$nav = [
  'catalogue' => 'Каталог',
  'korzina' => 'Корзина',
  'account' => 'Аккаунт'
];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeinSpiel</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="font/inter.css">
  <link rel="stylesheet" href="font/pixel-font.css  ">
  <link rel="shortcut icon" href="./img/logo.svg" type="image/x-icon">
</head>

<body>
  <content>
    <header>
      <a class="title inner-header" href="/" title="На главную">
        <img src="./img/logo.svg" class="LOGO">
        <h1>Mein<br>Spiel</h1>
      </a>
      <form class="search inner-header">
        <input type="text" name="searchQuery" placeholder="Поиск">
        <button><img src="./img/Search.svg" alt="Искать"></button>
      </form>
      <nav class="inner-header">
        <?php
        if ($user) {
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
            if ($user) {
          ?>
              <a href="<?= $item ?>.php" class="logoLink"><img src="./img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } elseif ($item != 'account') { ?>
              <a href="<?= $item ?>.php" class="logoLink"><img src="./img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } else {
            ?>
              <a href="#<?= $item ?>" id="loginBtn" class="logoLink"><img src="./img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
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
<?php } ?>