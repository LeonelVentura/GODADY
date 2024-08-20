<?php
// controlador_phpmailer.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../GestionVoluntarios/phpmailer/vendor/autoload.php';

if (!function_exists('enviarCorreoConfirmacion')) {
function enviarCorreoConfirmacion($correo, $token) {
    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'arsocial.fiei.online';  // Cambiar por tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'proyecto_integrador@arsocial.fiei.online';  // Cambiar por tu dirección de correo
        $mail->Password = 'R-Q.=m)SCqZ+';  // Cambiar por tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465;  // Puerto SMTP
        
        // Configuración del correo
        $mail->setFrom('proyecto_integrador@arsocial.fiei.online', 'CuresUNFV');
        $mail->addAddress($correo);
        $mail->Subject = 'Confirmacion de Registro';
        $mail->isHTML(true);
        $mail->Body = 'Gracias por registrarte. Haz clic en el siguiente enlace para confirmar tu registro: <a href="http://localhost:3000/Clone/ResponsabilidadSocial-1/web/confirmar_registro.php?token=' . $token . '">Confirmar Registro</a>';
        
        // Envío del correo
        $mail->send();
        return true;  // Correo enviado correctamente
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;  // Mostrar error
        return false;  // Error al enviar el correo
    }
}
}
