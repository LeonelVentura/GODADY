<?php //session_start();
    include "../../clases/Eventos1.php";
    $Eventos = new Eventos();
    $data = array(
        "id_evento" =>$_POST['id_evento'],
        "evento" => $_POST['nombre_eventou'],
        "hora_inicio" => $_POST['fechau']. " " .$_POST['hora_iniciou'],
        "hora_fin" => $_POST['fechau']. " " .$_POST['hora_finu'],
        "estado" => $_POST['estadou'],
        "fecha" => $_POST['fechau']
        //"id_evento" => $_SESSION['id_evento']
    );

    echo $Eventos->actualizarEvento($data);

?>
