<?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require 'phpmailer/vendor/autoload.php';
// rechazar_solicitud.php

$id = $_GET['id'];

// Conexión a la base de datos
$conex = mysqli_connect("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Rechazar solicitud
$sql = "UPDATE formulario SET estado = 'rechazada' WHERE id_form = $id";
if ($conex->query($sql) === TRUE) {
    // Obtener datos del solicitante
    $sql = "SELECT email, nombre FROM formulario WHERE id_form = $id";
    $result = $conex->query($sql);
    $solicitante = $result->fetch_assoc();

 
    // Enviar notificación por correo
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->Host = 'arsocial.fiei.online';
      $mail->Port = 465;
      $mail->Username = 'proyecto_integrador@arsocial.fiei.online';  // Cambiar por tu dirección de correo
      $mail->Password = 'R-Q.=m)SCqZ+';  // Cambiar por tu contraseña
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
      
       $mail->setFrom('proyecto_integrador@arsocial.fiei.online');
       $mail->addAddress("$solicitante[email]","  $solicitante[nombre] ");
       $mail->Subject = "Solicitud de Voluntariado Rechazada";
       $mail->Body = "Hola " . $solicitante['nombre'] . ",\n\nLamentamos informarte que tu solicitud de voluntariado ha sido rechazada. Agradecemos tu interes.\n\nSaludos,\nCENTRO UNIVERSITARIO DE RESPONSABILIDAD SOCIAL\nFIEI";
       //send the message
       if ($mail->send()) {
        // Redirigir con un parámetro indicando éxito
        header("Location: administrador.php?status=rechazada");
    } else {
        // Redirigir con un parámetro indicando error en el envío de correo
        header("Location: administrador.php?status=error_correo");
    }
    
} else {
    // Redirigir con un parámetro indicando error en la actualización
    header("Location: administrador.php?status=error_actualizacion");
}

$conex->close();
?>