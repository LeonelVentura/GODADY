<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Publicar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
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

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            display: flex;
            flex-direction: column;
            gap: 1px;
            position: static; /* Añadido para el fondo de formulario */
        }

        label {
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background: #ffa420;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #FFA500;
        }

        textarea {
            resize: vertical;
            height: 50px;
        }

        form::before {
            content: "";
            background: url('./uploads/imagina.jfif') no-repeat center center;
            background-size: cover;
            opacity: 0.1; /* Adjust the opacity here */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 8px;
            z-index: -1;
        }

        #success-message {
            display: none;
            color: green;
            margin-top: 20px;
        }
    </style>
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


