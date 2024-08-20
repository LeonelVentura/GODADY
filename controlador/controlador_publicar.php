<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
    $ruta_subida = '../uploads/';
    $archivo_subido = $ruta_subida . basename($_FILES['imagen']['name']);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo_subido)) {
        echo "El archivo se subió correctamente.";
        // Guarda la ruta o nombre del archivo en la base de datos
        $ruta_imagen = 'uploads/' . $_FILES['imagen']['name'];
        
        // Conexión a la base de datos (incluir archivo de conexión si es necesario)
        include "../conexion.php";

        // Ejemplo de inserción en la base de datos
        $query = "INSERT INTO publicaciones (titulo, descripcion, imagen) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $titulo = $_POST['titulo']; // Suponiendo que tienes un campo 'titulo' en tu formulario
        $descripcion = $_POST['descripcion']; // Suponiendo que tienes un campo 'descripcion' en tu formulario
        $stmt->bind_param("sss", $titulo, $descripcion, $ruta_imagen);
        
        if ($stmt->execute()) {
            echo "Publicación guardada correctamente.";
        } else {
            echo "Error al guardar la publicación: " . $stmt->error;
        }
    } else {
        echo "Hubo un error al subir el archivo.";
    }
}
