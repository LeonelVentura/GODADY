<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'evento' => $_POST['nombre_evento'],
        'hora_inicio' => $_POST['hora_inicio'],
        'hora_fin' => $_POST['hora_fin'],
        'fecha' => $_POST['fecha'],
        'id_usuario' => $_POST['id_usuario'] // Este campo proviene del campo oculto en el formulario
    ];

    $evento = new Eventos();
    if ($evento->agregar($data)) {
        echo "Evento agregado con éxito!";
    } else {
        echo "Error al agregar el evento.";
    }
}
?>