<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'arsocial.fiei.online';
$mail->Port = 465;
$mail->Username = 'proyecto_integrador@arsocial.fiei.online';  // Cambiar por tu dirección de correo
$mail->Password = 'R-Q.=m)SCqZ+';  // Cambiar por tu contraseña
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 

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