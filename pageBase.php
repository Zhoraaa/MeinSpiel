<?php
include "./functions/connect.php";
$return = $_SESSION['result'] ?? null;

include "./functions/user.php"
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeinSpiel</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../often.css">
  <link rel="stylesheet" href="../catalogues.css">
  <link rel="stylesheet" href="../font/inter.css">
  <link rel="stylesheet" href="../font/pixel-font.css">
  <link rel="shortcut icon" href="../img/logo.svg" type="image/x-icon">
</head>

<body>
  <content id="mainContent">

    <header>
      <a class="title" href="/" title="На главную">
        <img src="../img/logo.svg" class="LOGO">
        <h1>Mein<br>Spiel</h1>
      </a>
      <nav class="">
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
          $nav = [
            'keySet' => 'Добавить ключи',
            'catalogue' => 'Каталог',
            'cart' => 'Корзина',
            'account' => 'Аккаунт'
          ];

          foreach ($nav as $item => $title) {
            if (isset($user)) {
          ?>
              <a href="../<?= $item ?>.php" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } elseif (!isset($user) && $item != "account") {
            ?>            
              <a href="../<?= $item ?>.php" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
            <?php
            } elseif (!isset($user) && $item == "account") {
            ?>
              <a onclick="authBlock()" id="loginBtn" class="logoLink"><img src="../img/<?= $item ?>.svg" alt="<?= $title ?>"></a>
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
    <img src="../img/mountains.svg">
    <div class="info"><?php echo (isset($_SESSION['result'])) ? $_SESSION['result'] : null ;?></div>
    <div class="spacer"></div>
  </footer>

</body>

</html>
<script src="../script.js"></script>
<?php
        unset($_SESSION['result']);
      }
?>