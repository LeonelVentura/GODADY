<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Responsabilidad Social</title>
    <link rel="stylesheet" href="contacto.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <ul>
                <li><a href="../index.php">Home</a></li>
            </ul>
        </div>
    </nav>
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
    </main>

    <script src="script.js"></script>
</body>
</html>

