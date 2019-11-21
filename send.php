<?php
$to = "roma@itc-media.ru" ;
$subject = "Заказ звонка";
$message = '<p><b>Имя:</b> '.$_POST['e-name'].'</p><p><b>Телефон:</b> '.$_POST['e-phone'].'</p>';
$headers = "From: Сайт site.ru <info@site.ru>\r\nContent-type: text/html; charset=uft-8 \r\n";
mail($to, $subject, $message, $headers);
?>