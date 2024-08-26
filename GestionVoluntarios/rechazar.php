<?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require '../vendor/autoload.php';
// rechazar_solicitud.php

$id = $_GET['id'];

// Conexión a la base de datos
 /* $conex = mysqli_connect("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db"); */
 $conex = mysqli_connect("localhost", "root", "", "proyecto");

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

 
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host       = 'arsocial.fiei.online';         // Cambia esto por tu servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'proyecto_integrador@arsocial.fiei.online';    // Cambia esto por tu usuario SMTP
    $mail->Password   = 'R-Q.=m)SCqZ+';               // Cambia esto por tu contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    
              /*    
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'arsocial.fiei.online';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username = 'proyecto_integrador@arsocial.fiei.online';
            $mail->Password = 'R-Q.=m)SCqZ+';
            */
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