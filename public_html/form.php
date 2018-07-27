<?php
$to      = 'k.kowalewska89@wp.pl';
$name = $_POST['name'];
$message = $_POST['message'];
$headers = 'From: ' . $_POST['email'] . "\r\n" .
	'Content-type: text/html; charset=utf-8';

email($to, $name, $message, $headers);
echo 'Twoja wiadomość została wysłana';
?>