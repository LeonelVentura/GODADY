<?php //session_start();
    include "../../clases/Eventos1.php";
    $Eventos = new Eventos();
    $id_evento = $_POST['id_evento'];
    echo json_encode($Eventos->editarEvento($id_evento));
?>