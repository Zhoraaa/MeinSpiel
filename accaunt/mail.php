<?php
require_once('../pageBase.php');

$to = $user['name_user'];
$subject = isset($_POST['Theme']) ?? null;
$message = isset($_POST['Message']) ?? null;
$headers = "From: ".$user['email']."\r\n";
$headers .= "Reply-To: meinspiel.ru"."\r\n";
mail($to, $subject, $message);

?>



<form action="" method="post" class="inner-shadow radius content-mail">

<input type="text" name="Theme" placeholder="Тема"  class="inner-shadow radius"/> 
<input type="text" name="Message" placeholder="Сообщение"  class="inner-shadow radius"/>
<button type="submit">Отправить письмо</button>
 
</form>

<?php 
endPage();
?>