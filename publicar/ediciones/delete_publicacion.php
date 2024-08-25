<?php
// Conectar a la base de datos
/*
$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");
*/

$conn = new mysqli("localhost", "root" , "", "proyecto");

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Eliminar la publicación de la base de datos
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Preparar la consulta SQL para prevenir inyección SQL
    $stmt = $conn->prepare("DELETE FROM publicaciones WHERE id_publicaciones = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Publicación eliminada correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID no especificado.";
}

$conn->close();
?>
