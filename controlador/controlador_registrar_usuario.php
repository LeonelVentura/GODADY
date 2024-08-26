<?php
// controlador_registrar_usuario.php

include ("../conexion.php");
include ("controlador_phpmailer.php");

if (!empty($_POST["btnregistro"])) {
    if (empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["escuela"]) || empty($_POST["correo"]) || empty($_POST["username"]) || empty($_POST["inputpass"])) {
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        // Obtener los datos del formulario
        $nombre = $_POST["nombres"];
        $apellido = $_POST["apellidos"];
        $facultad = $_POST["escuela"];
        $correo = $_POST["correo"];
        $username = $_POST["username"];
        $contraseña = $_POST["inputpass"];
        
        // Escapar los caracteres especiales en las variables
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $apellido = mysqli_real_escape_string($conexion, $apellido);
        $facultad = mysqli_real_escape_string($conexion, $facultad);
        $correo = mysqli_real_escape_string($conexion, $correo);
        $username = mysqli_real_escape_string($conexion, $username);
        $contraseña = mysqli_real_escape_string($conexion, $contraseña);
        
        // Generar token único para la confirmación de correo
        $rol= 2 ;
        $token = bin2hex(random_bytes(16));
        $confirmado = 0;

        $sql = $conexion->query("INSERT INTO usuario (nombres, apellidos, facultad, id_rol, correo, usuario, clave, token, confirmado) VALUES ('$nombre', '$apellido', '$facultad', '$rol', '$correo', '$username', '$contraseña', '$token', '$confirmado')");
        
        if ($sql) {
            // Enviar correo de confirmación
            if (enviarCorreoConfirmacion($correo, $token)) {
                echo '<div class="success">Usuario registrado. Por favor, revisa tu correo para confirmar el registro.</div>';
            } else {
                echo '<div class="alerta">Error al enviar el correo de confirmación</div>';
            }
        } else {
            echo '<div class="alerta">Error al registrar</div>';
        }
    }
}
