<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $to      = 'info@webrave.cz';
    $subject = 'the subject';
    $message = $name. ' ' .$phone;
    
    if (!$name || $name === "" && !$phone || $phone === "") {
        echo '{ "result": false }';
        return;
    }

    echo '{ "result": true }';
    mail($to, $subject, $message);
?>