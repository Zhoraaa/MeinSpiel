<?php
include "./functions/connect.php";
$return = $_SESSION['result'] ?? null;

include "./user/user.php";

if (isset($_SESSION['potential_delete'])) {
    unset($_SESSION['potential_delete']);
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
  <link rel="stylesheet" href="../often.css">
  <link rel="stylesheet" href="../catalogues.css">
  <link rel="stylesheet" href="../font/inter.css">
  <link rel="stylesheet" href="../font/pixel-font.css">
  <link rel="shortcut icon" href="../img/logo.svg" type="image/x-icon">
</head>

<body>
  <content id="mainContent">
    <div id="ajaxPlace" class="radius blur pad0"></div>
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
          if (isset($user) && $user['role'] == 1) {
          ?>
            <a href="../settings.php" class="logoLink"><img src="../img/plus.svg" alt="Инструменты добавления"></a>
          <?php
          }
          ?>
          <a href="../catalogue.php" class="logoLink"><img src="../img/catalogue.svg" alt="Каталог"></a>
          <?php
          if (!isset($user)) {
          ?>
            <a id="loginBtn" class="logoLink"><img src="../img/account.svg" alt="Авторизация"></a>
          <?php
          } else {
          ?>
            <a href="../cart.php" class="logoLink"><img src="../img/cart.svg" alt="Корзина"></a>
            <a href="../account.php" class="logoLink"><img src="../img/account.svg" alt="Личный кабинет"></a>
          <?php
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

  <footer>
    <img src="../img/mountains.svg">
    <div class="info"><?php echo (isset($_SESSION['result'])) ? $_SESSION['result'] : null; ?></div>
  </footer>

</body>

</html>
<script src="/scripts/susi.js"></script>
<script src="/scripts/ajax.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    let formSS = false;
    document.querySelector("#loginBtn").addEventListener("click", (event) => {
      formSS = !formSS;
      if (formSS) {
        asyncLoad("sources/accounting.html", "ajaxPlace");
      } else {
        asyncClear("ajaxPlace");
      }
    });
  });
</script>
<?php
        unset($_SESSION['result']);
      }
?>