<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Publicar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles1.css">

</head>
<body>

<div class="navbar">
    <a href="../index.php">Home</a>
    <a href="./ediciones/edicion.php">Ediciones</a>
    <a href="./eventos.php">Ir a Eventos</a>
</div>

<div class="container">
    <h1>Nuevo Evento</h1>
    <form id="publish-form" action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required><br><br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea><br><br>
        <label for="image">Seleccionar imagen:</label>
        <input type="file" name="image" id="image" required><br><br>
        <input type="submit" value="Publicar!">
    </form>
    <div id="success-message">¡Publicación exitosa!</div>
</div>

<script>
$(document).ready(function() {
    $('#publish-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#success-message').show();
                $('#publish-form')[0].reset();
            },
            error: function() {
                alert('Error al publicar.');
            }
        });
    });
});
</script>

</body>
</html>


