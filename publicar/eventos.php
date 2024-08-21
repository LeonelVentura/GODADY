
<?php
$servername = "localhost";
$username = "cures_dev";
$password = "yZJSUpXg4tnu";
$dbname = "arsocial_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM publicaciones ORDER BY fecha_publicacion DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Eventos FIEI</title>
    <style>
    body {
    position: relative;
    margin-top: 60px; /* Espacio para la barra de navegación fija */
    background: url('./uploads/UNFV.jpg') no-repeat center center fixed;
    background-size: cover;   
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Ajusta el color y la opacidad aquí */
    z-index: -1; /* Asegura que el pseudo-elemento esté detrás del contenido del body */
}

.navbar {
    width: 100%;
    background-color: #333;
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    padding: 2px 0; /* Reduce el padding para hacerla más delgada */
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    display: flex;
    justify-content: flex-end; /* Alinea el contenido a la derecha */
}

.navbar a {
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 5px 10px; /* Reduce el padding de los enlaces */
    text-decoration: none;
    font-size: 15px; /* Reduce el tamaño de fuente para hacerla más delgada */
    font-weight: bold;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 0; /* Elimina el padding del contenedor de la galería */
    margin: 0; /* Elimina el margen del contenedor de la galería */
}

.photo {
    margin: 100px; /* Reduce el margen entre las fotos */
    border: 1px solid #ccc;
    padding: 10px; /* Reduce el padding del contenedor de la foto */
    width: calc(100% - 40px); /* Ajusta el ancho según el margen */
    max-width: 500px; /* Ajusta el ancho máximo según tus necesidades */
    box-sizing: border-box;
    background: rgba(255, 255, 255, 0.9); /* Fondo blanco con opacidad */
}

.photo img {
    width: 100%;
    height: auto; /* Permite que la imagen mantenga su proporción */
    object-fit: contain; /* Asegura que la imagen se ajuste dentro del contenedor sin recortes */
}

/*para el tamaño de las letras*/
.photo h2 {
    margin-top: 16px;
    font-size: 24px;
}

.photo p {
    margin-top: 12px;
    font-size: 16px;
}

@media (max-width: 768px) {
    .photo {
        width: calc(50% - 40px); /* Dos fotos por fila en tablets y pantallas medianas */
    }
}

@media (max-width: 480px) {
    .photo {
        width: calc(100% - 40px); /* Una foto por fila en pantallas pequeñas */
    }
}

    </style>
</head>
<body>

<div class="navbar">
    <a href="../index.php">Home</a>
    <a href="../GestionVoluntarios/FormularioVoluntariado.php">👉
    ¿Quieres ser Voluntario?👈</a>
</div>


<h1>Eventos</h1>
<div class="gallery">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='photo'>";
            echo "<img src='" . $row["imagen"] . "' alt='" . $row["titulo"] . "'>";
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["descripcion"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No hay fotos disponibles.";
    }
    ?>
</div>

<?php
$conn->close();
?>

</body>
</html>



<section id="jjjd" class="section">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comentarios</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="../vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/emoji-picker/lib/js/config.js"></script>
    <script src="../vendor/emoji-picker/lib/js/util.js"></script>
    <script src="../vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="../vendor/emoji-picker/lib/js/emoji-picker.js"></script>
</head>

<section id="jjjd" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php include "../conexion.php"; ?>
                    <br>
                    <br>
                    <h3>Comentario</h3>
                    <p>Cuentanos tu opinión acerca de nuestro sitio</p>
                    <br>
                    <div class="contact-info col-lg-6 wow fadeInUp" data-wow-duration="500ms">
                        <form id="frm-comment">
                            <div class="input-row">
                                <input type="hidden" name="comment_id" id="post" />
                                <label for="nombre" class="form-label">Usuario:</label>
                                <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])): ?>
                                    <input class="form-control" type="text" name="nombre" id="nombre" readonly value="<?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?>" required />
                                <?php else: ?>
                                    <input class="form-control" type="text" name="unknow_name" readonly value="Debes registrarte para Comentar" />
                                <?php endif; ?>
                            </div>
                            <div class="input-row">
                                <label for="comme" class="form-label">Comentario:</label>
                                <p class="emoji-picker-container">
                                    <textarea rows="6" class="form-control" name="comentario" id="comentario" placeholder="Agregue su comentario" required></textarea>
                                </p>
                            </div>
                            <div>
                                <input type="button" class="btn btn-primary" id="submitButton" value="Agregar Comentario" />
                            </div>
                            <br>
                            <div id="comment-message">¡Tu comentario se agregó!</div>
                        </form>
                    </div>
                    <div id="output"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sessionNombre = "<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>";
            var sessionApellido = "<?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : ''; ?>";
            var inputUsuario = document.getElementById('nombre');
            var inputUnknown = document.getElementById('unknow_name');
            if (sessionNombre && sessionApellido) {
                inputUsuario.value = sessionNombre + ' ' + sessionApellido;
            } else {
                inputUnknown.style.display = 'block'; // Mostrar el campo para usuarios desconocidos
            }
        });

        function postReply(post) {
            $('#post').val(post);
            $("#nombre").focus();
        }

        $("#submitButton").click(function () {
            $("#comment-message").css('display', 'none');
            var str = $("#frm-comment").serialize();
            $.ajax({
                url: "../controlador/controlador_insertar_respuesta.php",
                data: str,
                type: 'post',
                success: function (response) {
                    $("#comment-message").css('display', 'inline-block');
                    $("#comentario").val("");
                    $("#post").val("");
                    listComment();
                }
            });
        });

        $(document).ready(function () {
            listComment();
        });

        $(function () {
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '../vendor/emoji-picker/lib/img/',
                popupButtonClasses: 'icon-smile'
            });
            window.emojiPicker.discover();
        });

        function listComment() {
    $.post("../views/Lista_Comentarios.php", function (data) {
        try {
            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = [];
            var list = $("<ul class='outer-comment'>");
            var item = $("<li>").html(comments);

            for (var i = 0; i < data.length; i++) {
                var post = data[i]['id'];
                parent = data[i]['respuesta'];

                if (parent == "0") {
                    comments = "<div class='comment-row'>" +
                        "<div class='comment-info'><img src='../views/user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + "</span></div>" +
                        "<div class='comment-text'>" + data[i]['comentarios'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + post + ")'>Responder</a></div>" +
                        "<div class='comment-text'>" + data[i]['fecha'] + "</div>" + "</div>";
                    var item = $("<li>").html(comments);
                    list.append(item);
                    var reply_list = $('<ul>');
                    item.append(reply_list);
                    listReplies(post, data, reply_list);
                }
            }
            $("#output").html(list);
        } catch (e) {
            console.error("Error parsing JSON:", e);
        }
    });
}


        function listReplies(post, data, list) {
            for (var i = 0; i < data.length; i++) {
                if (post == data[i].respuesta) {
                    var comments = "<div class='comment-row'>" +
                        " <div class='comment-info'><img src='user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + " </span></div>" +
                        "<div class='comment-text'>" + data[i]['comentarios'] +
                        "<div class='comment-text'>" + data[i]['fecha'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['id'] + ")'>Responder</a></div>" +
                        "</div>";
                    var item = $("<li>").html(comments);
                    var reply_list = $('<ul>');
                    list.append(item);
                    item.append(reply_list);
                    listReplies(data[i].id, data, reply_list);
                }
            }
        }
    </script>
</body>
</html>

