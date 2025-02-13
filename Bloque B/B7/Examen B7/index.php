<?php
// Definir array para el menú, errores y datos procesados
$menu = [
    'primerPlatoNombre' => '',
    'primerPlatoDescripcion' => '',
    'primerPlatoPrecio' => '',
    'segundoPlatoNombre' => '',
    'segundoPlatoDescripcion' => '',
    'segundoPlatoPrecio' => '',
    'postreNombre' => '',
    'postreDescripcion' => '',
    'postrePrecio' => '',
    'bebidaIncluida' => '',
];

$error = [
    'primerPlatoNombre' => '',
    'primerPlatoDescripcion' => '',
    'primerPlatoPrecio' => '',
    'segundoPlatoNombre' => '',
    'segundoPlatoDescripcion' => '',
    'segundoPlatoPrecio' => '',
    'postreNombre' => '',
    'postreDescripcion' => '',
    'postrePrecio' => '',
    'bebidaIncluida' => '',
];

$datos = [];
$mensaje = '';
$max_size = 5242880; // Max file size (5MB)
$tipo_extension = ['image/jpeg', 'image/png']; // Tipos MIME permitidos

// Inicializar variables para las rutas de las imágenes
$rutaPlato1 = '';
$rutaPlato2 = '';
$rutaPostre = '';

// Procesar los datos del menú en el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validación de datos
    $filtros = [
        'primerPlatoNombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]{1,20}$/']
        ],
        'primerPlatoDescripcion' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z0-9\s]{1,200}$/']
        ],
        'primerPlatoPrecio' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\d+(\.\d{1,2})?$/']
        ],
        'segundoPlatoNombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]{1,20}$/']
        ],
        'segundoPlatoDescripcion' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z0-9\s]{1,200}$/']
        ],
        'segundoPlatoPrecio' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\d+(\.\d{1,2})?$/']
        ],
        'postreNombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]{1,20}$/']
        ],
        'postreDescripcion' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z0-9\s]{1,200}$/']
        ],
        'postrePrecio' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\d+(\.\d{1,2})?$/']
        ],
        'bebidaIncluida' => [
            'filter' => FILTER_VALIDATE_BOOLEAN,
            'flags' => FILTER_NULL_ON_FAILURE
        ]
    ];

    // Validamos los datos de entrada
    $menu = filter_input_array(INPUT_POST, $filtros);

    // Evaluamos los resultados de validación
    foreach ($menu as $key => $value) {
        if ($value === null) {
            $error[$key] = "ERROR: El campo $key es obligatorio.";
        } else {
            $error[$key] = '';
        }
    }

    // Validación de imágenes
    $imagenes = ['plato1', 'plato2', 'postre'];
    foreach ($imagenes as $imagen) {
        if ($_FILES[$imagen]['error'] === UPLOAD_ERR_OK) {
            if ($_FILES[$imagen]['size'] > $max_size || !in_array($_FILES[$imagen]['type'], $tipo_extension)) {
                $error[$imagen] = "ERROR: La imagen debe ser .jpeg o .png y no superar los 5 MB.";
            } else {
                // Guardar el sitio temporal
                $temporal = $_FILES[$imagen]['tmp_name'];
                $ruta = './imagenes/img_miniatura/' . $imagen . '.' . pathinfo($_FILES[$imagen]['name'], PATHINFO_EXTENSION);
                // Mover la imagen
                if (move_uploaded_file($temporal, $ruta)) {
                    $mensaje .= "<b>Fichero:</b> " . $_FILES[$imagen]['name'] . "<br>";
                    $mensaje .= "<b>Size:</b> " . $_FILES[$imagen]['size'] . " bytes <br>";
                    $mensaje .= "El archivo se ha cargado correctamente.<br>";
                    $mensaje .= '<img src="' . $ruta . '" alt="' . $imagen . '"><br>';

                    // Guardar la ruta de la imagen para mostrarla más tarde
                    if ($imagen === 'plato1') {
                        $rutaPlato1 = $ruta;
                    } elseif ($imagen === 'plato2') {
                        $rutaPlato2 = $ruta;
                    } elseif ($imagen === 'postre') {
                        $rutaPostre = $ruta;
                    }
                } else {
                    $error[$imagen] = "ERROR: No se pudo mover la imagen.";
                }
            }
        } else {
            $error[$imagen] = "ERROR: No se ha subido la imagen.";
        }
    }

    // Saneamos los datos
    if (!array_filter($error)) {
        foreach ($menu as $key => $value) {
            $datos[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Día</title>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Formulario Menú del Día</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !array_filter($error)): ?>
        <div class="success"><?= $mensaje ?></div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Primer plato</h2>
        Nombre: <input type="text" name="primerPlatoNombre" value="<?= htmlspecialchars($menu['primerPlatoNombre']) ?>" required><br>
        <span class="error"><?= $error['primerPlatoNombre'] ?></span><br>
        
        Descripción: <textarea name="primerPlatoDescripcion" required><?= htmlspecialchars($menu['primerPlatoDescripcion']) ?></textarea><br>
        <span class="error"><?= $error['primerPlatoDescripcion'] ?></span><br>
        
        Precio: <input type="text" name="primerPlatoPrecio" value="<?= htmlspecialchars($menu['primerPlatoPrecio']) ?>" required><br>
        <span class="error"><?= $error['primerPlatoPrecio'] ?></span><br>
        
        Imagen: <input type="file" name="plato1" accept=".png, .jpeg" required><br>
        <?php if ($rutaPlato1): ?>
            <img src="<?= $rutaPlato1 ?>" alt="Plato 1" style="max-width: 300px; max-height: 300px;"><br>
        <?php endif; ?>

        <h2>Segundo plato</h2>
        Nombre: <input type="text" name="segundoPlatoNombre" value="<?= htmlspecialchars($menu['segundoPlatoNombre']) ?>" required><br>
        <span class="error"><?= $error['segundoPlatoNombre'] ?></span><br>
        
        Descripción: <textarea name="segundoPlatoDescripcion" required><?= htmlspecialchars($menu['segundoPlatoDescripcion']) ?></textarea><br>
        <span class="error"><?= $error['segundoPlatoDescripcion'] ?></span><br>
        
        Precio: <input type="text" name="segundoPlatoPrecio" value="<?= htmlspecialchars($menu['segundoPlatoPrecio']) ?>" required><br>
        <span class="error"><?= $error['segundoPlatoPrecio'] ?></span><br>
        
        Imagen: <input type="file" name="plato2" accept=".png, .jpeg" required><br>
        <?php if ($rutaPlato2): ?>
            <img src="<?= $rutaPlato2 ?>" alt="Plato 2" style="max-width: 300px; max-height: 300px;"><br>
        <?php endif; ?>

        <h2>Postre</h2>
        Nombre: <input type="text" name="postreNombre" value="<?= htmlspecialchars($menu['postreNombre']) ?>" required><br>
        <span class="error"><?= $error['postreNombre'] ?></span><br>
        
        Descripción: <textarea name="postreDescripcion" required><?= htmlspecialchars($menu['postreDescripcion']) ?></textarea><br>
        <span class="error"><?= $error['postreDescripcion'] ?></span><br>
        
        Precio: <input type="text" name="postrePrecio" value="<?= htmlspecialchars($menu['postrePrecio']) ?>" required><br>
        <span class="error"><?= $error['postrePrecio'] ?></span><br>
        
        Imagen: <input type="file" name="postre" accept=".png, .jpeg" required><br>
        <?php if ($rutaPostre): ?>
            <img src="<?= $rutaPostre ?>" alt="Postre" style="max-width: 300px; max-height: 300px;"><br>
        <?php endif; ?>

        <h2>Bebida incluida</h2>
        <select name="bebidaIncluida" required>
            <option value="">Seleccione...</option>
            <option value="Sí" <?= $menu['bebidaIncluida'] === 'Sí' ? 'selected' : '' ?>>Sí</option>
            <option value="No" <?= $menu['bebidaIncluida'] === 'No' ? 'selected' : '' ?>>No</option>
        </select><br>
        <span class="error"><?= $error['bebidaIncluida'] ?></span><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
