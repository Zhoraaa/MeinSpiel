<?php
require("pageBase.php");
?>
<form action="/user/updateBalance.php" class="inner-shadow pad20 radius">
  <div class="btns wrap">
    <a href="/account.php" class="white-border radius">Отмена</a>
    <a href="/user/updateBalance.php?for=500" class="white-border radius">500 ₽</a>
    <a href="/user/updateBalance.php?for=1000" class="white-border radius">1000 ₽</a>
    <a id="setSum" class="white-border radius">Своя сумма</a>
  </div>
  <div id="formSS"></div>
</form>
<script src="../scripts/ajax.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    let formSS = false;
    document.querySelector("#setSum").addEventListener("click", (event) => {
      formSS = !formSS;
      if (formSS) {
        asyncLoad("sources/formBalance.html", "formSS");
      } else {
        asyncClear("formSS");
      }
    });
  });
</script>
<?php
endPage();