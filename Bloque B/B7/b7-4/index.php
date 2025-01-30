<?php
// Ejercicio 4. Redimensionando Imágenes usando GD (Pag. 105)
// Inicialización
$moved         = false;                                       
$mensaje       = '';                                           
$error         = '';                                           
$upload_path   = 'uploads/';                                   // Path para img normales
$thumb_path    = 'uploads/thumbs/';                            // Path para thumbnails
$max_size      = 5242880;                                      // Max file size (5MB)
$allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif',];

// FUNCIÓN - Crear Nombre de Archivo
function create_filename($filename, $upload_path){

    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Captamos el basename
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Captamos la extension
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename); // Limpiamos el basename
    $filename   = $basename . '.' . $extension;                // Añadimos la extensión con el nombre limpiado
    // Contador
    $i          = 0;

    while (file_exists($upload_path . $filename)) {            // Si el archivo existe le añadimos un i+1 detrás
        $i        = $i + 1;
        $filename = $basename . $i . '.' . $extension;
    }
    return $filename;
}

// FUNCIÓN - Redimensionar Img
function resize_image_gd($orig_path, $new_path, $max_width, $max_height){

    // Inicialización
    $image_data  = getimagesize($orig_path);
    $orig_width  = $image_data[0];                        // ANCHO
    $orig_height = $image_data[1];                        // ALTO
    $media_type  = $image_data['mime'];                   // Media type
    $new_width   = $max_width;                            // Inicializamos el máximo de ambas
    $new_height  = $max_height;
    $orig_ratio  = $orig_width / $orig_height;            // Original image ratio

    // Calculamos el nuevo tamaño
    if ($orig_width > $orig_height) {                     // Si es un landscape
        $new_height = $new_width / $orig_ratio;           // Set height usando el ratio
    } else {
        $new_width  = $new_height * $orig_ratio;          // Set width usando el ratio
    }
    
    // Switch de casos
    switch($media_type) {
        case 'image/gif' :
            $orig = imagecreatefromgif($orig_path);
            break;
        case 'image/jpeg' :
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case 'image/png' :
            $orig = imagecreatefrompng($orig_path);
            break;
    }

    $new = imagecreatetruecolor($new_width, $new_height); // Creamos la img en blanco

    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height); // Copiamos la Original con la nueva

    // Guardamos la img
    switch($media_type) {
        case 'image/gif' : 
            $result = imagegif($new, $new_path);  
            break;
        case 'image/jpeg':
            $result = imagejpeg($new, $new_path);
            break;
        case 'image/png' :
            $result = imagepng($new, $new_path);
            break;
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobamos el error de tamaño de imagen
    $error = ($_FILES['image']['error'] === 1) ? 'too big ' : '';

    if ($_FILES['image']['error'] == 0) {
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'too big '; // Check tamaño de imagen
        
        // Comprobamos el Tipo y extensión de la imagen
        $type   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($type, $allowed_types) ? '' : 'wrong type ';

        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'wrong file extension ';

        // Si no hay errores creamos la Ruta + Movemos la img + La Redimensionamos
        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbpath   = $thumb_path . 'thumb_' . $filename;
            $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized     = resize_image_gd($destination, $thumbpath, 200, 200);
        }
    }

    // Si todo ha ido bien y se ha movido
    if ($moved === true and $resized === true) {
        $mensaje = '<img src="' . $thumbpath . '">';                    
    } else {
        $mensaje = '<b>Could not upload file</b> ' . $error;
    }
}
?>

<?php include '../includes/header.php' ?>

<?= $mensaje ?>

    <form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
        <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <input type="submit" value="upload">
    </form>

<?php include '../includes/footer.php' ?>