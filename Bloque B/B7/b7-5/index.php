<?php
// Inicialización
$mover         = false;                                       
$mensaje           = '';                                           
$error         = '';                                           
$ruta          = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'imagenes'  . DIRECTORY_SEPARATOR;
$ruta_miniatura = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . 'img_miniatura'  . DIRECTORY_SEPARATOR;
$max_size      = 5242880;                                      // Max file size (5MB)
$tipo_extension = ['image/jpeg', 'image/png', 'image/gif'];      // Tipos MIME permitidos
$extension      = ['jpeg', 'jpg', 'png', 'gif'];                // Extensiones de archivos permitidas

// --------------------------------------
// Crear los directorios si no existen
// --------------------------------------
if (!is_dir($ruta)) {
    mkdir($ruta, 0777, true); // Crear carpeta de imágenes si no existe
}
if (!is_dir($ruta_miniatura)) {
    mkdir($ruta_miniatura, 0777, true); // Crear carpeta de miniaturas si no existe
}

// --------------------------------------
// Funciones
// --------------------------------------

/**
 * Función para crear un nombre de archivo único.
 * Evita que el archivo subido sobrescriba uno existente.
 */
function create_filename($nombre_fichero, $ruta) {
    $nombre_base = pathinfo($nombre_fichero, PATHINFO_FILENAME);        // Nombre base sin extensión
    $extension  = pathinfo($nombre_fichero, PATHINFO_EXTENSION);       // Extensión del archivo
    $nombre_base = preg_replace('/[^A-z0-9]/', '-', $nombre_base);     // Limpiar el nombre base
    $nombre_fichero = $nombre_base . '.' . $extension;                  // Combinar con la extensión
    $i          = 0;

    // Comprobar si el archivo ya existe, y si es así, añadir un sufijo numérico
    while (file_exists($ruta . $nombre_fichero)) {
        $i++;
        $nombre_fichero = $nombre_base . $i . '.' . $extension;
    }

    return $nombre_fichero;
}

/**
 * Función para redimensionar una imagen utilizando Imagick
 */
function create_thumbnail($ruta_img, $ruta_img_min){
    $img = new Imagick($ruta_img);
    $img->thumbnailImage(200, 200, true, true); // Redimensionar la imagen
    $img->writeImage($ruta_img_min);             // Guardar la imagen redimensionada

    return true;
}

// --------------------------------------
// Lógica de manejo de archivo subido
// --------------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos el error de tamaño de imagen
    $error = ($_FILES['image']['error'] === 1) ? 'El archivo es demasiado grande.' : '';

    if ($_FILES['image']['error'] == 0) {
        // Validar tamaño de imagen
        $error .= ($_FILES['image']['size'] <= $max_size) ? '' : ' El archivo es demasiado grande.';

        // Comprobamos el tipo MIME de la imagen
        $type = mime_content_type($_FILES['image']['tmp_name']);
        $error .= in_array($type, $tipo_extension) ? '' : ' Tipo de archivo no permitido.';

        // Validar la extensión de la imagen
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $extension) ? '' : ' Extensión de archivo no permitida.';

        // Si no hay errores, movemos y redimensionamos la imagen
        if (!$error) {
            // Crear nombre único para el archivo
            $nombre_fichero    = create_filename($_FILES['image']['name'], $ruta);
            $destination       = $ruta . $nombre_fichero;
            $thumbpath         = $ruta_miniatura . 'thumb_' . $nombre_fichero;

            // Mover el archivo subido
            $mover = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            // Redimensionar imagen
            $redimensionar = create_thumbnail($destination, $thumbpath);
        }
    }

    // Ruta para mostrar la imagen si todo ha ido bien
    $rut_nueva = './imagenes/img_miniatura/thumb_' . $nombre_fichero;

    // Si todo ha ido bien (archivo movido y redimensionado)
    if ($mover && $redimensionar) {
        $mensaje = '<img src="' . $rut_nueva . '" alt="Thumbnail">';  // Mostrar miniatura
    } else {
        $mensaje = '<b>No se pudo subir el archivo</b> ' . $error;
    }
}
?>

<?php include '../includes/header.php' ?>

<?= $mensaje ?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <label for="image"><b>Subir archivo:</b></label>
    <input type="file" name="image" accept="image/*" id="image"><br>
    <input type="submit" value="Subir">
</form>

<?php include '../includes/footer.php' ?>