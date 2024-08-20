<?php
session_start();
if(!empty($_POST["btningresar"])){       
    if(!empty($_POST["usuario"]) and !empty( $_POST["password"])){        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        
        // Aquí realizas la consulta SQL
        $sql = $conexion->query("select * from Usuario where usuario='$usuario' and clave='$password'");
         //seleccionamos los datos de la base de datos y los solicitamos para usarlos en la pagina 
        
        // Verifica si hay resultados 
        if ($sql && $datos = $sql->fetch_object()) {    
            $_SESSION["id"]= $datos->id;
            $_SESSION["nombre"]= $datos->nombres;
            $_SESSION["apellido"]= $datos->apellidos;
            $_SESSION["usuario"]= $datos->usuario;
            header("Location: ../web/index.php");
            exit; // Importante: termina el script después de redirigir
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "Campos vacíos";
    }
}
