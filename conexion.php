<?php
// Configura los detalles de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crea la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

