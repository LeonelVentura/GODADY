<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Sugerencia de Eventos</title>
    <style>
   body {
  font-family: Arial, sans-serif;
  margin: 20px;
  background-color: #00274C;
  color: #fff;
}

h2 {
  text-align: center;
  color: #fff;
}

form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #555; /* Borde gris claro para contraste */
  border-radius: 5px;
  background-color: #194868; /* Azul más claro para el formulario */
}

/* Resto del CSS... */

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input, select, textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

textarea {
  resize: vertical;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
    </style>
</head>
<body>

    <h2>Sugerencia de Eventos</h2>
    <form id="sugerencia-form" action="process_sugerencia.php" method="POST">
        <label for="nombre_evento">Nombre del evento:</label><br>
        <input type="text" id="nombre_evento" name="nombre_evento" required><br><br>

        <label for="categoria_evento">Categoría del evento:</label><br>
        <select id="categoria_evento" name="categoria_evento" required>
            <option value="">Selecciona una categoría</option>
            <option value="academico">Académico</option>
            <option value="cultural">Cultural</option>
            <option value="social">Social</option>
            <option value="deportivo">Deportivo</option>
            <option value="otros">Otros</option>
        </select><br><br>

        <label for="descripcion_evento">Descripción del evento:</label><br>
        <textarea id="descripcion_evento" name="descripcion_evento" rows="4" cols="50" required></textarea><br><br>

        <label for="motivo_evento">¿Por qué sugieres este evento?</label><br>
        <textarea id="motivo_evento" name="motivo_evento" rows="4" cols="50" required></textarea><br><br>

        <label for="correo_personal">Correo Personal:</label><br>
        <input type="email" id="correo_personal" name="correo_personal" required><br><br>

        <label for="numero_celular">Número de celular (9 dígitos):</label><br>
        <input type="tel" id="numero_celular" name="numero_celular" required pattern="[0-9]{9}"><br><br>

        <input type="submit" value="Enviar Sugerencia">
    </form>
</body>
</html>

