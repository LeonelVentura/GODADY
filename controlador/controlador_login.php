<?php
session_start();
require_once ("../conexion.php");  
if(!empty($_POST["btningresar"])){       
    if(!empty($_POST["usuario"]) && !empty($_POST["password"])){        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        
        $sql = $conexion->query("SELECT * FROM Usuario WHERE usuario='$usuario' AND clave='$password'");
        
        if ($sql && $datos = $sql->fetch_object()) {    
            $_SESSION["id"] = $datos->id;
            $_SESSION["nombre"] = $datos->nombres;
            $_SESSION["apellido"] = $datos->apellidos;
            $_SESSION["usuario"] = $datos->usuario;
            $_SESSION["id_rol"] = $datos->id_rol;  // Store the role ID in the session
            
            header("Location: ../index.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "Campos vacíos";
    }
}
?>