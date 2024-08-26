<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (!function_exists('enviarCorreoConfirmacion')) {
    function enviarCorreoConfirmacion($correo, $token) {
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'arsocial.fiei.online';     
            $mail->SMTPAuth   = true;
            $mail->Username   = 'proyecto_integrador@arsocial.fiei.online';  
            $mail->Password   = 'R-Q.=m)SCqZ+';            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Remitente
            $mail->setFrom('proyecto_integrador@arsocial.fiei.online', 'ARSocial Contacto');
            $mail->addAddress($correo);

            // Título y cuerpo del mensaje
            $mail->Subject = 'Confirmación de Registro';
            $mail->isHTML(true);

            // Cuerpo del correo con personalización y enlaces claros
            $mail->Body = '
                <html>
                <head>
                    <title>Confirmacion de Registro</title>
                </head>
                <body>
                    <h1>Gracias por registrarte en ARSocial</h1>
                    <p>Hola,</p>
                    <p>Gracias por unirte a nuestra comunidad. Para completar tu registro, haz clic en el siguiente enlace:</p>
                    <p><a href="https://arsocial.fiei.online/web/confirmar_registro.php?token=' . $token . '">Confirmar Registro</a></p>
                    <p>Si no solicitaste este registro, por favor ignora este correo.</p>
                    <p>Gracias,<br>El equipo de ARSocial</p>
                </body>
                </html>
            ';

            // Configuración adicional para evitar spam
            $mail->AltBody = 'Gracias por registrarte en ARSocial. Haz clic en el siguiente enlace para confirmar tu registro: https://arsocial.fiei.online/web/confirmar_registro.php?token=' . $token;
            $mail->addCustomHeader('X-Mailer', 'PHP/' . phpversion());

            // Configuración DKIM (si tu dominio lo soporta)
            $mail->DKIM_domain = 'arsocial.fiei.online';
            $mail->DKIM_private = '/path/to/private.key';
            $mail->DKIM_selector = 'default';
            $mail->DKIM_passphrase = '';
            $mail->DKIM_identity = $mail->From;

            // Envío del correo
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log('Error al enviar el correo: ' . $mail->ErrorInfo);
            return false;
        }
    }
}
