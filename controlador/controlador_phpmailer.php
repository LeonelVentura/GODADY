<?php
// controlador_phpmailer.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (!function_exists('enviarCorreoConfirmacion')) {
    function enviarCorreoConfirmacion($correo, $token) {
        $mail = new PHPMailer(true);
        
        try {
            
        $mail->isSMTP();
        $mail->Host       = 'arsocial.fiei.online';         // Cambia esto por tu servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'proyecto_integrador@arsocial.fiei.online';    // Cambia esto por tu usuario SMTP
        $mail->Password   = 'R-Q.=m)SCqZ+';               // Cambia esto por tu contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        // Remitente
        $mail->setFrom('proyecto_integrador@arsocial.fiei.online', 'Contacto');
        $mail->addAddress($correo);

            $mail->Subject = 'Confirmacion de Registro';
            $mail->isHTML(true);
            $mail->Body = 'Gracias por registrarte. Haz clic en el siguiente enlace para confirmar tu registro: <a href="http://localhost:3000/web/confirmar_registro.php?token=' . $token . '">Confirmar Registro</a>';
            
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