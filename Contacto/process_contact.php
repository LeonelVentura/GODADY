<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $asunto = htmlspecialchars($_POST['asunto']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $correopersonal = htmlspecialchars($_POST['correopersonal']);
    
    // Define tu correo electrónico
    $destinatario = "curesunfv@gmail.com"; // Reemplaza esto con tu correo electrónico real
    
    // Asunto del correo
    $subject = "Nuevo mensaje de contacto: " . $asunto;
    
    // Contenido del correo
    $message = "Asunto: " . $asunto . "\n";
    $message .= "Descripción: " . $descripcion . "\n";
    $message .= "Teléfono: " . $telefono . "\n";
    $message .= "Correo Personal: " . $correopersonal . "\n";
    
    // Cabeceras del correo
    $headers = "From: " . $correopersonal . "\r\n";
    $headers .= "Reply-To: " . $correopersonal . "\r\n";
    
    // Envía el correo
    if (mail($destinatario, $subject, $message, $headers)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo.";
    }
}


