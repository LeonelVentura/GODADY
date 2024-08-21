<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos de la publicación a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM publicaciones WHERE id_publicaciones = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Editar Publicación</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="navbar">
    <a href="./edicion.php">Volver</a>
    <a href="../eventos.php">Ir a Eventos</a>
</div>
    <div class="container">
        <h1>Editar Publicación</h1>
        <form id="edit-form" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id_publicaciones']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
            <input type="submit" value="Actualizar">
        </form>
        <div id="success-message" style="display:none; color: green; margin-top: 20px; text-align: center;">
    ¡Actualización exitosa!
</div>

    </div>

    <script>
    $(document).ready(function() {
        $('#edit-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: 'edit_publicacion.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#success-message').show();
                },
                error: function() {
                    alert('Error al actualizar.');
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
// Actualizar la publicación en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $sql = "UPDATE publicaciones SET titulo='$titulo', descripcion='$descripcion' WHERE id_publicaciones=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Actualización exitosa";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
