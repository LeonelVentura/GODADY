<?php
// aprobar_solicitud
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require './phpmailer/vendor/autoload.php';
$id = $_GET['id'];

// Conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "proyecto");
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Aprobar solicitud
$sql = "UPDATE formulario SET estado = 'aprobada' WHERE id_form = $id";
if ($conex->query($sql) === TRUE) {

                
    // Obtener datos del solicitante
    $sql = "SELECT email, nombre FROM formulario WHERE id_form = $id";
    $result = $conex->query($sql);
    $solicitante=$result->fetch_assoc();
               
    // Enviar notificación por correo
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
       $mail->addAddress("$solicitante[email]","  $solicitante[nombre] ");
       $mail->Subject = "Solicitud de Voluntariado Aprobada";
       $mail->Body = "Hola " . $solicitante['nombre'] . ",\n\nNos complace informarte que tu solicitud de voluntariado ha sido aceptada. \n\nSaludos,\nCENTRO UNIVERSITARIO DE RESPONSABILIDAD SOCIAL\nFIEI";
       //send the message
       if ($mail->send()) {
        // Redirigir con un parámetro indicando éxito
        header("Location: administrador.php?status=aceptada");
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