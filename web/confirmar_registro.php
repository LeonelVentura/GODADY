
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .success-message {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error-message {
            color: #f44336;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
// Verificar si se ha recibido un token válido por GET
if (isset($_GET['token'])) {
    $token = $_GET['token'];  // Obtener el token desde el parámetro GET
    
    // Conectar a la base de datos (reemplaza con tus datos de conexión)
    include('../conexion.php'); // Asegúrate de tener el archivo de conexión adecuado

    // Consulta SQL para buscar el usuario por el token y que no esté confirmado
    $sql = "SELECT * FROM usuario WHERE token = '$token' AND confirmado = 0";
    $result = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        // Usuario encontrado, actualizar el estado de confirmado
        $updateSql = "UPDATE usuario SET confirmado = 1 WHERE token = '$token'";
        if (mysqli_query($conexion, $updateSql)) {
            echo '<div class="container">';
            echo '<div class="success-message">¡Registro Confirmado Correctamente!</div>';
            echo '<p>Ahora puedes iniciar sesión en tu cuenta.</p>';
            echo '</div>';
        } else {
            echo '<div class="container">';
            echo '<div class="error-message">Error al Confirmar el Registro</div>';
            echo '<p>No se pudo actualizar el estado del usuario.</p>';
            echo '</div>';
        }
    } else {
        // Usuario no encontrado o ya confirmado
        echo '<div class="container">';
        echo '<div class="error-message">Error: Token no válido</div>';
        echo '<p>El enlace de confirmación no es válido o el usuario ya ha sido confirmado.</p>';
        echo '</div>';
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Si no se proporcionó un token válido por GET
    echo '<div class="container">';
    echo '<div class="error-message">Error: Token no encontrado</div>';
    echo '<p>El enlace de confirmación no es válido.</p>';
    echo '</div>';
}
?>

</body>
</html>