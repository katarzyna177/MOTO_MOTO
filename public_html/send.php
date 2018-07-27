<?php

require_once 'class.phpmailer.php';

$_POST = array_map('trim', $_POST);

$error = false;

if (!isset($_POST['name']) || empty($_POST['name'])) {
    $error = true;
}

if (!isset($_POST['email']) || empty($_POST['email']) || !PHPMailer::ValidateAddress($_POST['email'])) {
    $error = true;
}

if (!isset($_POST['message']) || empty($_POST['message'])) {
    $error = true;
}


if ($error) {
    exit('nok');
}

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';

$mail->SetFrom($_POST['email'], $_POST['name']);
$mail->AddAddress('k.kowalewska89@wp.pl');
$mail->Subject = 'Wiadomość ze strony internetowej';
$mail->Body = $_POST['message'];

if (!$mail->Send()) {
    exit('nok');
}

exit('ok');

?>