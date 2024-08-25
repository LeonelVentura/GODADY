<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Cambiar por tu servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = 'srodrigamer2@gmail.com';  // Cambiar por tu dirección de correo
$mail->Password = 'msnf hylg eelt zrkv';  // Cambiar por tu contraseña
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;  // Puerto SMTP

            /*
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'arsocial.fiei.online';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username = 'proyecto_integrador@arsocial.fiei.online';
            $mail->Password = 'R-Q.=m)SCqZ+';
            */

$mail->setFrom('proyecto_integrador@arsocial.fiei.online');
$mail->addAddress('recipients@email-address.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}