<?php
// Conectar a la base de datos
/*
$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");
*/
$conn = new mysqli("localhost", "root", "", "proyecto");
// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener las publicaciones
$sql = "SELECT * FROM publicaciones";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styless1.css">
    <title>Ver Publicaciones</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="navbar">
    
    <a href="../formulario.php">Volver</a>
    <a href="../eventos.php">Ir a Eventos</a>
</div>

<div class="">
<h1>Edición de Publicaciones</h1>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Publicación</th>
            <th>Acciones</th>
        </tr>
</div>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr id="publicacion-<?php echo $row['id_publicaciones']; ?>">
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['fecha_publicacion']; ?></td>
            <td class="action-buttons">
                <a href="edit_publicacion.php?id=<?php echo $row['id_publicaciones']; ?>" class="edit-button">Editar</a>
                <a href="#" class="delete-button" onclick="eliminarPublicacion(<?php echo $row['id_publicaciones']; ?>)">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <script>
        function eliminarPublicacion(id) {
            if (confirm('¿Estás seguro de que deseas eliminar esta publicación?')) {
                $.ajax({
                    url: 'delete_publicacion.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        alert(response);
                        $('#publicacion-' + id).remove();
                    },
                    error: function() {
                        alert('Error al eliminar la publicación.');
                    }
                });
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
