<?php 
   
      include("conexion.php");
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require '../vendor/autoload.php';


      
   if(isset($_POST['register'])) {
     if(
        strlen($_POST['name']) >= 1 && 
        strlen($_POST['lastname']) >= 1 && 
        strlen($_POST['codigo']) >= 1 &&
        strlen($_POST['email']) >= 1 && 
        strlen($_POST['phone']) >= 1 && 
        strlen($_POST['activity']) >= 1 
        
        
       ) {

            
            

             $name=trim($_POST['name']);
             $lastname=trim($_POST['lastname']);
             $codigo=trim($_POST['codigo']);
             $email=trim($_POST['email']);
             $phone=trim($_POST['phone']);
             $activity=trim($_POST['activity']);
             $message=trim($_POST['message']);
             $fecha=date("Y/m/d");
             

             $consulta="INSERT INTO formulario(nombre, apellidos, codigo_de_estudiante, email, telefono, actividad, mensaje, fecha)
                  VALUES('$name', '$lastname', '$codigo','$email', '$phone', '$activity','$message', '$fecha')";

                  //Validacion de una cuenta-evitar que se duplique el registro
             $checkEmail=mysqli_query($conex, "SELECT * FROM formulario WHERE email='$email'");
             if (mysqli_num_rows($checkEmail) > 0) {
               echo '
               <script src="./js/alert.js"></script>
               ';
               exit();
             }
             
             if(mysqli_query($conex, $consulta)){

                  $mail = new PHPMailer;
                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';  // Cambiar por tu servidor SMTP
                  $mail->SMTPAuth = true;
                  $mail->Username = 'srodrigamer2@gmail.com';  // Cambiar por tu dirección de correo
                  $mail->Password = 'msnf hylg eelt zrkv';  // Cambiar por tu contraseña
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                  $mail->Port = 587;  // Puerto SMTP
                  
           /*                   
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'arsocial.fiei.online';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username = 'proyecto_integrador@arsocial.fiei.online';
            $mail->Password = 'R-Q.=m)SCqZ+';
            */
               

                  $mail->setFrom('proyecto_integrador@arsocial.fiei.online','CuresUNFV');
                  $mail->addAddress("$email","$name");
                  $mail->Subject = "Confirmacion de Solicitud de Voluntariado";
                  $mail->Body = "Hola $name,\n\nGracias por tu interes en participar en la actividad de: $activity. Hemos recibido tu solicitud y nos pondremos en contacto contigo pronto.\n\nSaludos,\nCENTRO UNIVERSITARIO DE RESPONSABILIDAD SOCIAL\nFIEI";
                  //send the message
                  if ($mail->send()) {

                    // Redirigir con un parámetro indicando éxito
                        header("Location:  FormularioVoluntariado.php?status=Solicitud_enviada");
                     }   else {
                    // Redirigir con un parámetro indicando error en el envío de correo
                        header("Location:   FormularioVoluntariado.php?status=error_correo");
                        }

             }  else {
              // Redirigir con un parámetro indicando error en la actualización
            header("Location:   FormularioVoluntariado.php?status=error_actualizacion");
           }
       

     }   

   } 
?>