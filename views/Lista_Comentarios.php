<?php
include "../conexion.php";

// Consulta para obtener los comentarios
$query = "SELECT Cod_Coments, nombre, comentarios, fecha, respuesta FROM comentarios";
$result = $conexion->query($query);

$comments = array();
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

// Devolver los comentarios en formato JSON
header('Content-Type: application/json');
echo json_encode($comments);

$conexion->close();
