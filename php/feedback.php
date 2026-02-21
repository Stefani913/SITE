<?php
$errors = array();
if($_POST['nam'] == "") $errors[] = "заполните поле";
if($_POST['sub'] == "") $errors[] = "заполните Subject";
if($_POST['ema'] == "") $errors[] = "заполните E-mail";
if($_POST['mes'] == "") $errors[] = "заполните Message";

if(empty($errors)){
    $mail_to = "isaevastefania13@yandex.ru";
    $subject = "Feedback";
    
    $message .="Name: ".$_POST['nam']."<br>";
    $message .="Subject: ".$_POST['sub']."<br>";
    $message .="E-mail: ".$_POST['ema']."<br>";
    $message .="Message: ".$_POST['mes']."<br>";
    
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8'. "\r\n";
    $headers .= 'From:SHOPNO <почта с сайта>'. "\r\n";
    
    $send = mail($mail_to, $subject, $message, $headers);
    
    if ($send == 'true')
    {
        echo "<p style='color: green;'>Письмо отправлено!</p> <br>
        <a href='../index.html'>назад</a>";
    }else
    {
        echo "<p style='color: red;'>Ошибка отправки сообщения!</p> <br>
        <a href='../index.html'>назад</a>";
    }
}
else{
    $msg_box ='';
    
    foreach($errors as $one_error){
        $msg_box .= "<div style='color:red;'>$one_error<div><br>";
    }
}

echo json_encode(array($msg_box));
?>
