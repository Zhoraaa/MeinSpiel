<?php
require_once('../pageBase.php');

$to = $user['name_user'];
$subject = 'Тема';
$message = 'Сообщение';
$headers = "From: meinspiel.ru"."\r\n";
$headers .= "Reply-To: meinspiel.ru"."\r\n" ;
mail($to, $subject, $message);

?>



<form action="" method="post" class="inner-shadow radius">
        
<input type="text" name="" placeholder="Тема"  class="inner-shadow radius "/>
<input type="text" name="" placeholder="Сообщение"  class="inner-shadow radius"/>
<button type="submit">Отправить письмо</button>
 
</form>
