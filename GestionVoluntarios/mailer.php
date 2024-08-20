<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';
$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'dhanery23pf@gmail.com';
$mail->Password = 'kncyykxaeighwjkw';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 

$mail->setFrom('dhanery23pf@gmaio.com');
$mail->addAddress('recipients@email-address.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}