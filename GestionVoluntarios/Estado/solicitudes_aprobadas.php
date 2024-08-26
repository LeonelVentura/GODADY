<?php
// Conexión a la base de datos

/*$conn = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db");*/

$conex = mysqli_connect("localhost", "root", "", "proyecto");
if(!$conex) {
    die("Conexión fallida " . mysqli_connect_error());
}


   $por_pagina=10;
   if(isset($_GET['pagina']) && $_GET['pagina'] >0)
   $pagina=$_GET['pagina'];
   else 
   {
    $pagina=1;
   }
    $empieza=($pagina - 1) * $por_pagina;

// Filtrar por evento
$id_evento = isset($_GET['evento']) ? intval($_GET['evento']) : 0;

// Obtener solicitudes con filtro de evento
$sql = "SELECT f.*, e.evento AS id_evento FROM formulario f 
        INNER JOIN eventos e ON f.id_evento = e.id_evento 
        WHERE f.estado = 'aprobada'";



if ($id_evento > 0) {
    $sql .= " AND e.id_evento = $id_evento";
}

$sql .= " ORDER BY f.id_form ASC LIMIT $empieza, $por_pagina";
$result = $conex->query($sql);

// Obtener el total de solicitudes para la paginación
$sql_total = "SELECT COUNT(*) as total FROM formulario f 
              INNER JOIN eventos e ON f.id_evento = e.id_evento 
              WHERE f.estado = 'aprobada'";

if ($id_evento > 0) {
    $sql_total .= " AND e.id_evento = $id_evento";
}

$result_total = $conex->query($sql_total);
$total_registros = $result_total->fetch_assoc()['total'];
$total_paginas = ceil($total_registros / $por_pagina);

// Obtener eventos para el filtro
$sql_eventos = "SELECT * FROM eventos";
$result_eventos = $conex->query($sql_eventos);
?>

<div class="page-content">
            <div class="analytics"></div>
            <div class="records table-responsive">
                <div class="record-header">
                    <div class="add">
                        <span>EVENTOS</span>
                        <form method="GET" action="">
                        <input type="hidden" name="tab" value="<?= isset($_GET['tab']) ? htmlspecialchars($_GET['tab']) : 'Aprobadas' ?>">
                            <select name="evento" id="activity">
                            <option value="" disabled <?= $id_evento === 0 ? 'selected' : '' ?>>Seleccionar</option>
                                <?php while($evento = $result_eventos->fetch_assoc()): ?>
                                    <option value="<?= $evento['id_evento'] ?>" <?= $evento['id_evento'] == $id_evento ? 'selected' : '' ?>>
                                        <?= $evento['evento'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <button type="submit">Filtrar</button>
                        </form>
                    </div>
                </div>

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
                                echo "<td>" . $row['id_evento'] . "</td>";
                                echo "<td class='mensaje'>" . $row['mensaje'] . "</td>";
                                echo "</tr>";
                                }
                                ?>
                        </tbody>                              
                    </table>
                </div>
            </div>
        </div>


        <?php
        // Paginación


        echo "<center class='paginacion-wrapper'>
            <a class='paginacion' href='../administrador.php?pagina=1&evento=$id_evento&tab=Aprobadas'> << </a>";

        for($i = 1; $i <= $total_paginas; $i++) {
            echo "<a class='paginacion' href='../administrador.php?pagina=$i&evento=$id_evento&tab=Aprobadas'> $i </a>";
        }

        echo "<a class='paginacion' href='../administrador.php?pagina=$total_paginas&evento=$id_evento&tab=Aprobadas'> >> </a>
        </center>";
        ?>              
                
            

        


