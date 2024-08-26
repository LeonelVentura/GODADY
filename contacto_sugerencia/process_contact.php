<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];;
    $telefono = $_POST['telefono'];
    $correopersonal = $_POST['correopersonal'];
    
    // Define tu correo electrónico
    //$destinatario = "proyecto_integrador@arsocial.fiei.online"; // Reemplaza esto con tu correo electrónico real

    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP

        $mail->isSMTP();
        $mail->Host       = 'arsocial.fiei.online';         // Cambia esto por tu servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'proyecto_integrador@arsocial.fiei.online';    // Cambia esto por tu usuario SMTP
        $mail->Password   = 'R-Q.=m)SCqZ+';               // Cambia esto por tu contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        // Remitente
        $mail->setFrom('proyecto_integrador@arsocial.fiei.online', 'Contacto');
        $mail->addAddress($correopersonal);

        // Asunto y contenido del correo
        $mail->Subject = "Nuevo mensaje de contacto: " . $asunto;
        $mail->Body    = "Asunto: " . $asunto . "\n" .
                          "Descripcion: " . $descripcion . "\n" .
                          "Telefono: " . $telefono . "\n" .
                          "Correo Personal: " . $correopersonal;

        // Envío del correo
        $mail->send();
        echo 'La sugerencia se ha enviado correctamente. Dale click al siguiente enlace para volver: <a href="../index.php">Volver</a>';
    } catch (Exception $e) {
        echo "Hubo un error al enviar la sugerencia. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de solicitud no válido.";
}

