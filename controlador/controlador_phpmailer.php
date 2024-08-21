<?php
// controlador_phpmailer.php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('enviarCorreoConfirmacion')) {
    function enviarCorreoConfirmacion($correo, $token) {
        $mail = new PHPMailer(true);
        
        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'arsocial.fiei.online';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username = 'proyecto_integrador@arsocial.fiei.online';
            $mail->Password = 'R-Q.=m)SCqZ+';
            
            // Configuración del correo
            $mail->setFrom('proyecto_integrador@arsocial.fiei.online', 'CuresUNFV');
            $mail->addAddress($correo);
            $mail->Subject = 'Confirmación de Registro';
            $mail->isHTML(true);
            $mail->Body = 'Gracias por registrarte. Haz clic en el siguiente enlace para confirmar tu registro: <a href="https://arsocial.fiei.online/web/confirmar_registro.php?token=' . $token . '">Confirmar Registro</a>';
            
            // Envío del correo
            $mail->send();
            return true;  // Correo enviado correctamente
        } catch (Exception $e) {
            // Registro de errores
            error_log('Error al enviar el correo: ' . $mail->ErrorInfo);
            return false;  // Error al enviar el correo
        }
    }
}