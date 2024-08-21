<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");

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
    <title>Ver Publicaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px; /* Ajusta el margen superior según sea necesario */
            
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f0b20e;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons a {
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .edit-button {
            background-color: #64ea0d;
        }
        .delete-button {
            background-color: #dc3545;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            text-align: center;
            margin-top: 1px; /* Añadido para dar espacio a la barra de navegación */
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="navbar">
    
    <a href="../formulario.php">Volver</a>
    <a href="../eventos.php">Ir a Eventos</a>
</div>

    <h1>Edición de Publicaciones</h1>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Publicación</th>
            <th>Acciones</th>
        </tr>
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
