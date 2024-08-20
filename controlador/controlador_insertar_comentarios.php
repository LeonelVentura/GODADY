<?php
include "../conexion.php";

$nombre = $conexion->real_escape_string($_POST['nombre']);
$comentario = $conexion->real_escape_string($_POST['comentarios']);

$stmt = $conexion->prepare('INSERT INTO comentarios (nombre, comentarios) VALUES (?, ?)');
$stmt->bind_param('ss', $nombre, $comentario);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
$stmt->close();
