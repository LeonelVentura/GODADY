<?php
require_once ("../conexion.php");  
$post = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";

$query = "INSERT INTO comentarios(respuesta, comentarios, nombre) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($query);
$stmt->bind_param('dss', $post, $comentario, $nombre);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
$stmt->close();
