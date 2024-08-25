<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Responsabilidad Social</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://cdn.pixabay.com/photo/2020/11/06/07/42/girl-5717067_1280.jpg'); /* Cambia esto por la URL de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: rgba(25, 72, 104, 0.9); /* Azul más claro con opacidad */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .back-button a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

    <main id="content">
        <h1>Contacto</h1>
        
        <form id="contact-form" action="process_contact.php" method="POST">
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="correopersonal">Correo Personal:</label>
            <input type="email" id="correopersonal" name="correopersonal" required>
            
            <button type="submit">Enviar</button>
        </form>

        <div class="back-button">
            <a href="../index.php">Regresar a la página principal</a>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>