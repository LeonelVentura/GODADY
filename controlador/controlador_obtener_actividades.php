<?php
// Conexión a la base de datos
 /*$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db"); */

 $conn = new mysqli("localhost", "root", "", "proyecto"); 

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las actividades
$sql = "SELECT id_evento, evento FROM eventos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_evento'] . "'>" . $row['evento'] . "</option>";
    }
} else {
    echo "<option value=''>No hay actividades disponibles</option>";
}

// Cerrar la conexión
$conn->close();
?>