<?php
//include "../GestionVoluntarios/ReporteExel/funciones.php";
$volunatrios = obtenerVoluntarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="./css/administrador.css">
    <link rel="stylesheet" href="./css/message.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<input type="checkbox" id="menu-toggle">
    
<div class="main-content">
    <header>
        <div class="header-content"></div>
    </header>
    <main>
        <div class="page-header" id="page-header">
            <h1>Solicitudes</h1>
            <a href="../index.php"><small>Home</small></a>
            <a href="./administrador.php"><small>Solicitudes</small></a>
        </div>
        <div class="tabs">
    <button class="tablink" onclick="openTab('Pendientes', this)" <?= isset($_GET['tab']) && $_GET['tab'] == 'Pendientes' ? 'class="active"' : '' ?>>Pendientes</button>
    <button class="tablink" onclick="openTab('Aprobadas', this)" <?= isset($_GET['tab']) && $_GET['tab'] == 'Aprobadas' ? 'class="active"' : '' ?>>Aprobadas</button>
    <button class="tablink" onclick="openTab('Rechazadas', this)" <?= isset($_GET['tab']) && $_GET['tab'] == 'Rechazadas' ? 'class="active"' : '' ?>>Rechazadas</button>
</div>
<!--a href="./ReporteExel/exel.php" class="download-link">Descargar exel</a-->

        <div id="Pendientes" class="tabcontent">
            <?php include './Estado/solicitudes_pendientess.php'; ?>
        </div>

        <div id="Aprobadas" class="tabcontent">
            <?php include './Estado/solicitudes_aprobadas.php'; ?>
        </div>

        <div id="Rechazadas" class="tabcontent">
            <?php include './Estado/solicitudes_rechazadas.php'; ?>
        </div>
        
    </main>
</div>

<script src="./js/message.js"></script>
<script>
function openTab(tabName, elmnt) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    elmnt.className += " active";

    // Update URL with the active tab
    var url = new URL(window.location.href);
    url.searchParams.set('tab', tabName);
    window.history.pushState({}, '', url);
}

// Show the tab based on URL parameter on page load
document.addEventListener('DOMContentLoaded', function() {
    var tabName = new URLSearchParams(window.location.search).get('tab');
    if (!tabName) {
        tabName = 'Pendientes'; // Default tab
    }
    document.querySelector(`button[onclick="openTab('${tabName}', this)"]`).click();
});
</script>

</body>
</html>