function SUSISwitcher(elemID, thisID) {
  console.log("triggered!");

  let elem = document.getElementById(`${elemID}`);

  let thisElement = document.getElementById(thisID);
  let thisForm = thisElement.parentElement;

  if (elem.classList.contains("hide")) {
    elem.classList.remove("hide");
    thisForm.classList.add("hide");
  } else {
    elem.classList.add("hide");
    thisForm.classList.remove("hide");
  }
}

function delAuthBlock() {
  let authBlock = document.getElementById("account");
  authBlock.remove();
}

function authBlock() {
  if (document.getElementById("account")) {
    console.log("Найдено");
    delAuthBlock();
  } else {
    console.log("Не найдено");

    let parent = document.getElementById("mainContent");

    let auth = document.createElement("div");
    auth.id = "account";
    auth.classList.add("radius", "blur");
    auth.innerHTML =
      '<a onclick="authBlock()" id="loginBtn" class="logoLink"><img src="../img/account.svg"></a>' +

      '<form action="../user/signInDB.php" method="get" id="signIn">' +
        '<div><input type="text" name="login" placeholder="Логин" class="inner-shadow inter"></div>' +
        '<div><input type="password" name="pass" placeholder="Пароль" class="inner-shadow inter"></div>' +
        '<button type="submit" class="radius white-border">Войти</button>' +
        '<div id="switchToSU" onclick="SUSISwitcher(\'signUp\', this.id)" class="pointer ctrl-u">Регистрация</div>' +
      '</form>' +

      '<form action="../user/signUpDB.php" method="get" id="signUp" class="hide">' +
        '<div><input type="text" name="login" placeholder="Логин" class="inner-shadow inter"></div>' +
        '<div><input type="email" name="email" placeholder="Эл. почта" class="inner-shadow inter"></div>' +
        '<div><input type="password" name="pass" placeholder="Пароль" class="inner-shadow inter"></div>' +
        '<div><input type="password" name="passRep" placeholder="Повтор пароля" class="inner-shadow inter"></div>' +
        '<button type="submit" class="radius white-border">Регистрация</button>' +
        '<div id="switchToSI" onclick="SUSISwitcher(\'signIn\', this.id)" class="pointer ctrl-u">Вход</div>' +
      '</form>';

    parent.prepend(auth);
  }
}
