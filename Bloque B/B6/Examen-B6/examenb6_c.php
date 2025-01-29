<?php
// Definir arrays para el usuario, errores y datos procesados
$cliente = [
    'nombreCompleto' => '',        // Nombre completo, obligatorio, solo letras minimo 2 y máximo 50
    'correoElectronico' => '',     // Correo electrónico, obligatorio, debe ser una dirección válida
    'edad' => '',                  // Edad, obligatorio, solo números, mayor de 13
    'tipoLibro' => '',             // Tipo de libro, obligatorio, seleccionar una opción fisico o digital
    'privacidad' => '',            // Privacidad, obligatorio,checkbox
];
$error = [
    'nombreCompleto' => '',        
    'correoElectronico' => '',
    'edad' => '',
    'tipoLibro' => '',
    'privacidad' => '',
];
$datos =[];

//Procesar los datos del usuario en el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configuramos el fitro de datos
    $filtros = [
        'nombreCompleto' => [
            'filter' => FILTER_VALIDATE_REGEXP, // Filtro que valida que la entrada sea una cadena de texto
            'options' => ['regexp' => '/^[a-zA-Z\s]{2,50}$/'] // Filtro que solo acepta letras y espacios entre 2 y 50 caracteres
        ],
        'correoElectronico' =>  FILTER_VALIDATE_EMAIL, // Filtro que valida que la entrada sea una dirección de correo electrónico
        'edad' => [
            'filter' => FILTER_VALIDATE_REGEXP, // Filtro que valida que la entrada sea un número
            'options' => ['regexp' => '/^[0-9]{13,}$/'] // Filtro que solo acepta números entre 13 y infinito
        ],
        'tipoLibro' => [
            'filter' => FILTER_VALIDATE_REGEXP, // Filtro que valida que la entrada sea una opción de tipo de libro
            'options' => ['regexp' => '/^(Fisico|Digital)$/'] // Filtro que solo acepta opciones Fisico o Digital
        ],
        'privacidad' => [
            'filter' => FILTER_VALIDATE_BOOLEAN, // Filtro que valida que la entrada sea un checkbox
            'flags' => FILTER_NULL_ON_FAILURE // Filtro que permite que la entrada sea nula
        ]
    ];
    
    // Validamos los datos de entrada
    $cliente = filter_input_array(INPUT_POST, $filtros);
    
    // Evaluamos los resultados de validación
    $error['nombreCompleto'] = $cliente['nombreCompleto'] ? '' : 'ERROR: Nombre completo debe tener solo letras y entre 2 y 50 caracteres.';
    $error['correoElectronico'] = $cliente['correoElectronico'] ? '' : 'ERROR: Correo electrónico debe ser una dirección válida.';
    $error['edad'] = $cliente['edad'] ? '' : 'ERROR: La edad debe tener al menos 13 dígitos.';
    $error['tipoLibro'] = $cliente['tipoLibro'] ? '' : 'ERROR: Debe seleccionar una opción de tipo de libro.';
    $error['privacidad'] = $cliente['privacidad'] ? '' : 'ERROR: Debe aceptar la privacidad.';

    // Mostramos los mensajes de éxito o errores
    $invalid = implode('', $error);

    // Sanemos los datos
    if (!$invalid) {
        $datos['nombreCompleto'] = filter_var($cliente['nombreCompleto'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['correoElectronico'] = filter_var($cliente['correoElectronico'], FILTER_SANITIZE_EMAIL);
        $datos['edad'] = filter_var($cliente['edad'], FILTER_SANITIZE_NUMBER_INT);
        $datos['tipoLibro'] = $cliente['tipoLibro'];
        $datos['privacidad'] = $cliente['privacidad'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obteniendo datos desde en navegador</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
        }
        input[type=text] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            opacity: 0.8;
        }
        input[type=submit]:hover {
            opacity: 1;
        }
        p {
            margin: 10px 0;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    
<form action="examenb6_c.php" method="POST">
    <!-- Nombre completo -->
    Nombre completo: <input type="text" name="nombreCompleto" value="<?= htmlspecialchars($cliente['nombreCompleto']) ?>">
    <span class="error"><?= $error['nombreCompleto'] ?></span><br>

    <!-- Correo electrónico -->
    Correo electrónico: <input type="text" name="correoElectronico" value="<?= htmlspecialchars($cliente['correoElectronico']) ?>">
    <span class="error"><?= $error['correoElectronico'] ?></span><br>

    <!-- Edad -->
    Edad: <input type="text" name="edad" value="<?= htmlspecialchars($cliente['edad']) ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    <!-- Tipo de libro -->
    Tipo de libro:
    <select name="tipoLibro">
        <option value="">Seleccione...</option>
        <option value="Fisico" <?= $cliente['tipoLibro'] == 'Fisico' ? 'selected' : '' ?>>Fisico</option>
        <option value="Digital" <?= $cliente['tipoLibro'] == 'Digital' ? 'selected' : '' ?>>Digital</option>
    </select>
    <span class="error"><?= $error['tipoLibro'] ?></span><br>

    <!-- Aceptación de los términos -->
    <input type="checkbox" name="privacidad" value="1" <?= $cliente['privacidad'] ? 'checked' : '' ?>> Acepto los términos y condiciones.
    <span class="error"><?= $error['privacidad'] ?></span><br>

    <input type="submit" value="Registrar">
</form>
</body>
</html>
