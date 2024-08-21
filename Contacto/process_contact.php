<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $asunto = htmlspecialchars($_POST['asunto']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $correopersonal = htmlspecialchars($_POST['correopersonal']);
    
    // Define tu correo electrónico
    $destinatario = "proyecto_integrador@arsocial.fiei.online"; // Reemplaza esto con tu correo electrónico real

    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'arsocial.fiei.online';
        $mail->Port = 465;
        $mail->Username = 'proyecto_integrador@arsocial.fiei.online';  // Cambiar por tu dirección de correo
        $mail->Password = 'R-Q.=m)SCqZ+';  // Cambiar por tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        
        // Remitente
        $mail->setFrom($correopersonal, 'Contacto');
        $mail->addAddress($destinatario);

        // Asunto y contenido del correo
        $mail->Subject = "Nuevo mensaje de contacto: " . $asunto;
        $mail->Body    = "Asunto: " . $asunto . "\n" .
                          "Descripción: " . $descripcion . "\n" .
                          "Teléfono: " . $telefono . "\n" .
                          "Correo Personal: " . $correopersonal;

        // Envío del correo
        $mail->send();
        echo "Correo enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
