<?php
require_once('../pageBase.php');

$to = $user['name_user'];
$subject = 'Тема';
$message = 'Сообщение';
$headers = "From: meinspiel.ru"."\r\n";
$headers .= "Reply-To: meinspiel.ru"."\r\n" ;
mail($to, $subject, $message);

?>



<form action="" method="post">
        
<div class="inner-shadow radius">
<input type="text" name="" placeholder="Тема"  class="inner-shadow"/>
<input type="text" name="" placeholder="Сообщение"  class="inner-shadow"/>
<button type="submit">Отправить письмо</button>
</div>   
</form>
