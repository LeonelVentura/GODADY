<?php //session_start();
    //$id_evento = $_SESSION['id_evento'];
    include "../../clases/Eventos1.php";
    $Eventos = new Eventos();
    echo $Eventos->fullCalendar();
?>