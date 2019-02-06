<?php
    if (isset($_COOKIE['language'])) {
        $langCode = $_COOKIE['language'];
    } else {
        $langCode = 'ru';
    }
    require '../content/lang_'.$langCode.'.php';

    $name = "Имя:". ' ' .$_POST['name'];
    $phone = "Телефон:". ' ' .$_POST['phone'];
    $email = "E-mail:". ' ' .$_POST['email'];
    $msg = "Сообщение:". ' ' .$_POST['message'];
    $site = "Сайт:". ' ' .$_POST['site'];
    $to = 'info@webrave.cz';
    
    if (isset($site)){
        $subject = 'Заявка на сайт!';
        $message = $name. "\r\n" .$phone. "\r\n" .$email. "\r\n" .$site. "\r\n" .$msg;
    } else {
        $subject = 'Сообщение с контактной формы!';
        $message = $name. "\r\n" .$phone. "\r\n" .$email. "\r\n" .$msg;
    }
    
    $headers = 'MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n';
    
    if (!$name || $name === "" && !$phone || $phone === "") {
        echo '{ "result": false }';
        return;
    }

    echo $lang['formSent'];
    mail($to, $subject, $message, $headers);
?>