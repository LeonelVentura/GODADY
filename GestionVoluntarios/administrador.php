<?php


// Conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "proyecto");
if(!$conex) {
    die("Conexión fallida " . mysqli_connect_error());
}


  $por_pagina=10;
  if(isset($_GET['pagina']) && $_GET['pagina'] > 0)
  $pagina=$_GET['pagina'];
  else 
  {
    $pagina=1;
  }
    $empieza=($pagina-1) * $por_pagina;



// Obtener solicitudes
$sql = "SELECT * FROM formulario WHERE estado = 'pendiente' LIMIT $empieza, $por_pagina" ;
$result = $conex->query($sql);

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
        <div class="page-content">
            <div class="analytics"></div>
            <div class="records table-responsive">
                <div>
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                   <th>Nombre</th>
                                   <th>Apellidos</th>
                                   <th>Codigo de Estudiante</th>
                                   <th>Correo Institucional</th>
                                   <th>Teléfono</th>
                                   <th>Actividad</th>
                                   <th>Mensaje</th>
                                   <th>Acciones</th>
                            </tr>                                 
                        </thead>
                        <tbody>
                            <?php
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_form'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td>" . $row['apellidos'] . "</td>";
                                echo "<td>" . $row['codigo_de_estudiante'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['telefono'] . "</td>";
                                echo "<td>" . $row['actividad'] . "</td>";
                                echo "<td class='mensaje'>" . $row['mensaje'] . "</td>";
                                echo "<td class='acciones'>

                                <a class='accion aprobar' href='aprobar.php?id=" . $row['id_form'] . "'>Aprobar</a> |
                                <a class='accion rechazar' href='rechazar.php?id=" . $row['id_form'] . "'>Rechazar</a>
                                </td>";
                                echo "</tr>";
                                }
                                ?>
                        </tbody>                              
                    </table>

                </div>

            </div>
            
        </div>
                    <?php
                    $sql="SELECT * FROM  formulario WHERE estado = 'pendiente'";
                    $result=$conex->query($sql);

                    $total_registros=mysqli_num_rows($result);
                    $total_paginas=ceil($total_registros/$por_pagina);


                    echo"<center class='paginacion-wrapper'><a class='paginacion' href='administrador.php?pagina=1'>"  .'<<'. "</a>";
                    for($i=1;  $i<=$total_paginas;   $i++)
                    {
                        echo"<a class='paginacion' href='administrador.php?pagina=".$i."'> ".$i." </b> ";
                        }
                        echo"<a class='paginacion' href='administrador.php?pagina=$total_paginas'>"  .'>>'. "</a></center>";
                    ?>
            
    </main>
        
    </div>

    <script src="./js/message.js"></script>

</body>
</html>