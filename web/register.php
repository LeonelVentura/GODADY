<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body id="page-top">

        <?php
        include ("../conexion.php");
        include ("../controlador/controlador_registrar_usuario.php");
        include ("../controlador/controlador_phpmailer.php")
        ?>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registro de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-modal" action="" method="POST">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="escuela">Escuela de Pregrado</label>
                            <select id="escuela" name="escuela" class="form-control" required>
                                <option value="" disabled selected>Selecciona tu escuela</option>
                                <option value="Electronica">Ingeniería Electrónica</option>
                                <option value="Informatica">Ingeniería Informática</option>
                                <option value="Mecatronica">Ingeniería Mecatrónica</option>
                                <option value="Telecomunicaciones">Ingeniería de Telecomunicaciones</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Institucional</label>
                            <input type="email" id="correo" name="correo" class="form-control" pattern=".+@unfv\.edu\.pe" title="Debe utilizar un correo con el dominio @unfv.edu.pe" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Nombre de usuario</label>
                            <input id="user" type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="pass" type="password" class="form-control" name="inputpass" required>
                        </div>
                        <input class="btn btn-success" type="submit" value="Registrar" name="btnregistro">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>