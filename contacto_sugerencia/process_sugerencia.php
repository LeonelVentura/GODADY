<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

<<<<<<< HEAD
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
=======
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
>>>>>>> af761549e90ba56cfbed03f623d4662fc8a85042


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibiendo los datos del formulario
    $nombre_evento = $_POST['nombre_evento'];
    $categoria_evento = $_POST['categoria_evento'];
    $descripcion_evento = $_POST['descripcion_evento'];
    $motivo_evento = $_POST['motivo_evento'];
    $correo_personal = $_POST['correo_personal'];
    $numero_celular = $_POST['numero_celular'];

    // Crear una instancia de PHPMailer
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

        // Destinatarios
        $mail->setFrom($correo_personal, 'Sugerencia de Eventos');    // Correo del remitente
        $mail->addAddress('proyecto_integrador@arsocial.fiei.online');                     // Correo del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva sugerencia de evento';
        $mail->Body    = "<p><strong>Nombre del evento:</strong> {$nombre_evento}</p>
                          <p><strong>Categoria del evento:</strong> {$categoria_evento}</p>
                          <p><strong>Descripcion del evento:</strong><br>{$descripcion_evento}</p>
                          <p><strong>Motivo del evento:</strong><br>{$motivo_evento}</p>
                          <p><strong>Correo personal:</strong> {$correo_personal}</p>
                          <p><strong>Numero de celular:</strong> {$numero_celular}</p>";
        $mail->AltBody = "Nombre del evento: {$nombre_evento}\n
                          Categoria del evento: {$categoria_evento}\n
                          Descripcion del evento:\n{$descripcion_evento}\n
                          Motivo del evento:\n{$motivo_evento}\n
                          Correo personal: {$correo_personal}\n
                          Numero de celular: {$numero_celular}";

        // Enviar el correo
        $mail->send();
        echo 'La sugerencia se ha enviado correctamente. Dale click al siguiente enlace para volver: <a href="../index.php">Volver</a>';
    } catch (Exception $e) {
        echo "Hubo un error al enviar la sugerencia. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de solicitud no válido.";
}
