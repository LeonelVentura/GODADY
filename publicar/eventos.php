
<?php
/*
$servername = "localhost";
$username = "cures_dev";
$password = "yZJSUpXg4tnu";
$dbname = "arsocial_db";
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM publicaciones ORDER BY fecha_publicacion DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Eventos FIEI</title>
</head>

<body>
<link rel="stylesheet" href="styles.css">
<div class="navbar">
    <a href="../index.php">Home</a>
    <a href="../contacto_sugerencia/sugerencia.php">👨‍💻!Sugerir Evento!</a>
    <a href="../GestionVoluntarios/FormularioVoluntariado.php">
    🙋‍♂️¿Quieres ser Voluntario?</a>
</div>  
<h1>Eventos</h1>
</div>
<div class="gallery">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='photo'>";
            echo "<img src='" . $row["imagen"] . "' alt='" . $row["titulo"] . "'>";
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["descripcion"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No hay fotos disponibles.";
    }
    ?>
</div>

<?php
$conn->close();
?>

</body>
</html>



