<?php
use PDO;
function obtenerBaseDeDatos()
{
	$password = "";
	$usuario = "root";
	$nombreBaseDeDatos = "proyecto";
	$baseDeDatos = new PDO('mysql:host=localhost;dbname=' . $nombreBaseDeDatos, $usuario, $password);
	$baseDeDatos->query("set names utf8;");
	$baseDeDatos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	#$base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	return $baseDeDatos;
}


function obtenerVoluntarios()
{
	$baseDeDatos = obtenerBaseDeDatos();
	$sentencia = $baseDeDatos->query("SELECT id_form, nombre, apellidos, codigo_de_estudiante, email, telefono, id_evento, mensaje, fecha, estado FROM formulario");
	return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}