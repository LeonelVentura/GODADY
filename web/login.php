<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
    crossorigin="anonymous">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Logeo de Usuario</title>
</head>

<body>
    <a href="index.php" class="return-icon"><i class="fa-solid fa-house"></i></a>
    <div class="login">
        <form method="post" action="">
            <h2 class="titlelog">LOGIN</h2>
            <?php
            include "../conexion.php";
            include "../controlador/controlador_login.php";
            ?>
            <div class="input-div one">
                <div class="div">
                    <i class="fas fa-user"></i>
                    <label class="usuario" for="usu">Usuario</label><br>
                </div>
                <div class="input-div">
                    <input id="usuario" type="text" class="input" name="usuario">
                </div>
            </div>
            <div class="password-container">
                <div class="div">
                    <i class="fas fa-lock"></i>
                    <label class="password" for="pass">Contraseña</label>
                </div>
                <div class="input-div">
                    <input id="Input" type="password" class="input" name="password">
                </div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>
            </div>

            <div class="text-center">
                <a class="font-italic isa15" href="">Olvide mi contraseña</a>
                <a href="#" class="font-italic isa15" data-toggle="modal" data-target="#registerModal"> ¿Aun no tienes cuenta? Presiona Aquí</a>
            </div>
            <div class="imput">
                <input name="btningresar" class="boton" type="submit" value="INICIAR SESIÓN">
            </div>
        </form>
    </div>
    <?php include "register.php"; ?>
</body>

</html>

<script>
function vista() {
    var x = document.getElementById("Input");
    var icon = document.getElementById("verPassword");
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
