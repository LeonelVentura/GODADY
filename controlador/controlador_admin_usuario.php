<?php
require_once("conexion.php");  // Asegúrate de que la ruta sea correcta y que la conexión funcione

if (isset($_POST['confirmar_actualizacion'])) {
    $input_password = $_POST['admin_password'];
    $correct_password = '123456789'; // Cambia esto por la contraseña real

    if ($input_password === $correct_password) {
        if (isset($_SESSION['id'])) {
            $id_usuario = $_SESSION['id']; // Usar $_SESSION['id'] para obtener Cod_usuario
            $actualizar_rol_query = "UPDATE usuario SET id_rol = 1 WHERE Cod_usuario = ?";
            $stmt = $conexion->prepare($actualizar_rol_query);
            $stmt->bind_param("i", $id_usuario);

            if ($stmt->execute()) {
                echo "Rol actualizado correctamente.";
                $_SESSION['id_rol'] = 1; // Actualiza la sesión con el nuevo rol
            } else {
                echo "Error al actualizar el rol.";
            }
            $stmt->close();
        } else {
            echo "Error: ID de usuario no encontrado en la sesión.";
        }
    } else {
        echo "Contraseña incorrecta.";
    }
}
?>
