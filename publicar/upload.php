<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo de imagen es una imagen real o falsa
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar tamaño del archivo
    if ($_FILES['image']['size'] > 50000000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG, y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado a 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Convertir URLs en enlaces clicables
            $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
            $safeDescription = preg_replace(
                '/(http|https|ftp|ftps)\:\/\/([a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)/',
                '<a href="$0" target="_blank">$0</a>',
                $safeDescription
            );
            $safeDescription = nl2br($safeDescription);

            // Preparar y vincular
            $stmt = $conn->prepare("INSERT INTO publicaciones (titulo, descripcion, imagen) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $safeDescription, $target_file);

            if ($stmt->execute()) {
                echo "La foto ha sido subida y guardada en la base de datos.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}

$conn->close();
?>
