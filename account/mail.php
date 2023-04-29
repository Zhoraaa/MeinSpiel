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
<a>Письмо в техподдержку</a>
<input type="text" name="Theme" placeholder="Тема"  class="inner-shadow radius inter fifaks"/> 
<textarea type="text" name="Message" placeholder="Сообщение"  class="inner-shadow radius input-height inter fifaks"></textarea>
<button type="submit" class="radius inter fifaks">Отправить письмо</button>
 
</form>

<?php 
endPage();
?>