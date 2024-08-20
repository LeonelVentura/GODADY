<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Voluntarios</title>
    
    <link rel="stylesheet" href="./css/FormularioVoluntariado.css">
    <link rel="stylesheet" href="./css/messageForm.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <nav>
        <div class="nav-container">
            <ul>
                <li><a href="../index.php">Home</a></li>
            </ul>
        </div>
    </nav>


    <main>
        <div class="form-container">
            <div class="banner">
               <div class="banner-content">
                <h1></h1>
                </div>             
            </div>
            <form method="post">
                <h2>¡Bienvenido al equipo de voluntarios!</h2>
                <p> Por favor, completa este formulario.</p>
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="name">Nombres</label>                   
                </div>
                <div class="input-wrapper">
                    <input type="text" id="lastname" name="lastname" required><br><br>
                    <label for="lastname">Apellidos</label>                   
                </div>
                <div class="input-wrapper">
                    <input type="text" id="codigo" name="codigo" required><br><br>
                    <label for="codigo">Codigo de Estudiante</label>                   
                </div>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email"  pattern=".+@unfv\.edu\.pe"  required><br><br>
                    <label for="email">Correo Institucional</label> 
                </div>
                <div class="input-wrapper">
                     <input type="tel" id="phone" name="phone" required><br><br>
                     <label for="phone">Teléfono movil</label> 
                </div>
                <div class="input-wrapper">
                    
                    <input type="text" id="activity" name="activity" required><br><br>
                    <label for="activity">Actividad</label> 
                </div>
                <div class="input-wrapper">                    
                    <textarea type="text" id="message" name="message"></textarea><br><br>
                    <label for="message">Mensaje (opcional)</label> 
                </div>

                     <input class="btn" type="submit" name="register" value="Enviar">

            </form>


        </div> 
        <?php
        include("Registrar.php");
        ?>


    </main>

    <script src="./js/messageForm.js"></script>

</body>
</html>