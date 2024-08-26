<?php
// aprobar_solicitud
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      
      require './phpmailer/vendor/autoload.php';
$id = $_GET['id'];

// Conexión a la base de datos
/* $conex = mysqli_connect("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db"); */
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
    $mail->SMTPAuth = true;
    //$mail->Host = 'arsocial.fiei.online';
    //$mail->Port = 465;
    //$mail->Username = 'proyecto_integrador@arsocial.fiei.online';  // Cambiar por tu dirección de correo
    //$mail->Password = 'R-Q.=m)SCqZ+';  // Cambiar por tu contraseña
    $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = 'dhanery23pf@gmail.com';
                $mail->Password = 'kncyykxaeighwjkw';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    
     //$mail->setFrom('proyecto_integrador@arsocial.fiei.online');
     $mail->setFrom('dhanery23pf@gmail.com');
       $mail->addAddress("$solicitante[email]","  $solicitante[nombre] ");
       $mail->Subject = "Solicitud de Voluntariado Aprobada";
       //$mail->Body = "Hola " . $solicitante['nombre'] . ",\n\nNos complace informarte que tu solicitud de voluntariado ha sido aceptada. \n\nSaludos,\nCENTRO UNIVERSITARIO DE RESPONSABILIDAD SOCIAL\nFIEI";
       $mail->isHTML(true); 
                  $mail->Body = "
                  <html>
                  <body>
                      <h3>Hola $solicitante[nombre],</h3>
                      <p>Nos complace informarte que tu solicitud de voluntariado ha sido aceptada.<br>
                      Agradecemos tu interes.</p>
                      <p>Saludos,<br>CENTRO UNIVERSITARIO DE RESPONSABILIDAD SOCIAL<br>FIEI</p><br><br>
                      <div style='display: flex; align-items: center; justify-content: left;'>
                      <img src='cid:logo_unfv' style='width: 210px; height: auto; vertical-align: middle;' alt='Logo UNFV'>
                      <div style='width: 2px; height: 60px; background-color: #000; margin: 0 20px;'></div>
                    <span style='font-size: 34px; font-weight: bold;'>RS</span>
                </div>
                  </body>
                  </html>";
                   // Adjuntar la imagen
            $mail->addEmbeddedImage('../img/logo_fiei_2021.png', 'logo_unfv');
       
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