<?php

$subject = 'Тема';
$message = 'Сообщение';
$headers = "From: meinspiel.ru"."\r\n";
$headers .= "Reply-To: meinspiel.ru"."\r\n" ;
mail($subject, $message);

?>



<form action="" method="post">
        
<input type="name" name="" placeholder="Имя" />
<input type="text" name="" placeholder="Сообщение" />
<button type="submit">Отправить письмо</button>
        
</form>
