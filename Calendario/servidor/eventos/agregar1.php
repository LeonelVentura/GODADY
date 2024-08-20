<?php 
//session_start(); 

    include "../../clases/Eventos1.php";
    $Eventos = new Eventos();
    $data = array(
        'evento' => $_POST['nombre_evento'], 
        'hora_inicio' => $_POST['fecha'] . " " . $_POST['hora_inicio'], 
        'hora_fin' => $_POST['fecha'] . " " . $_POST['hora_fin'],
        'fecha' => $_POST['fecha']
    );

    echo $Eventos->agregar($data);
    
?>