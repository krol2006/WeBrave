<?php
    if (isset($_COOKIE['language'])) {
        $langCode = $_COOKIE['language'];
    } else {
        $langCode = 'ru';
    }
    require '../content/lang_'.$langCode.'.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $to      = 'info@webrave.cz';
    $subject = 'the subject';
    $message = $name. ' ' .$phone;
    $headers = 'From: info@webrave.cz' . "\r\n" .
    'Reply-To: info@webrave.cz' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    if (!$name || $name === "" && !$phone || $phone === "") {
        echo '{ "result": false }';
        return;
    }

    echo $lang['formSent'];
    mail($to, $subject, $message, $headers);
?>