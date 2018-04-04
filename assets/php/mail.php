<?php 
require_once "SendMailSmtpClass.php"; // подключаем класс
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message']; 

$mailSMTP = new SendMailSmtpClass('alexandron.redka@gmail.com', 'sasha2569', 'ssl://smtp.gmail.com', $name, 465); // создаем экземпляр класса
// $mailSMTP = new SendMailSmtpClass('логин', 'пароль', 'хост', 'имя отправителя');

// заголовок письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
$headers .= "From: ".$name." <".$email.">\r\n"; // от кого письмо
$result =  $mailSMTP->send('dev.redka@gmail.com', 'New message from '. $name.'.','<h1 style="font-size: 24px">Mail attached to the letter:</h1><p style="font-size: 20px">'.$email.'</p><h1 style="font-size: 24px">Message body</h1><p style="font-size: 20px">'.$message.'</p>', $headers); // отправляем письмо
// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Заголовки письма');
if($result === true){
   	header("Location: thank.html");
   	exit();
}else{
    header("Location: oops.html");
   	exit();
}
?>