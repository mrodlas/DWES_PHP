<?php
// Array para crear el usuario
$usuario = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];

// Array para crear los errores
$errores = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];

// Array para crear los mensajes
$mensajes = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];

// Si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtros para validar los datos
    $filtros = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]+$/']
        ],
        'correo' => FILTER_VALIDATE_EMAIL,
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\d{10}$/']
        ],
        'evento' => FILTER_SANITIZE_STRING,
        'terminos' => FILTER_VALIDATE_BOOLEAN,
    ];

    // Filtrar los datos
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Crear los errores
    $errores['nombre'] = $usuario['nombre'] ? '' : 'Debe escribir un nombre válido.';
    $errores['correo'] = $usuario['correo'] ? '' : 'El correo no es válido.';
    $errores['telefono'] = $usuario['telefono'] ? '' : 'El teléfono no es válido.';
    $errores['evento'] = !empty($usuario['evento']) ? '' : 'Debe seleccionar un tipo de evento.';
    $errores['terminos'] = $usuario['terminos'] ? '' : 'Debe aceptar los términos y condiciones.';

    // Verificar si hay errores
    $invalid = implode('', $errores);

    if (!$invalid) {
        // Si no hay errores, mostrar mensajes de éxito
        $mensajes['nombre'] = 'Datos correctos.';
        $mensajes['correo'] = 'Datos correctos.';
        $mensajes['telefono'] = 'Datos correctos.';
        $mensajes['evento'] = 'Datos correctos.';
        $mensajes['terminos'] = 'Datos correctos.';
    }
}
?>
<?php include 'includes/header.php'; ?>
<h1>Formulario de registro para eventos</h1>

<form action="final.php" method="POST">
    <!-- Nombre completo -->
    Nombre completo: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
    <span class="error"><?= $errores['nombre'] ?></span><br>

    <!-- Correo electrónico -->
    Correo electrónico: <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
    <span class="error"><?= $errores['correo'] ?></span><br>

    <!-- Teléfono -->
    Teléfono: <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>">
    <span class="error"><?= $errores['telefono'] ?></span><br>

    <!-- Tipo de evento -->
    Tipo de evento:
    <select name="evento">
        <option value="">Seleccione...</option>
        <option value="Presencial" <?= $usuario['evento'] == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
        <option value="Online" <?= $usuario['evento'] == 'Online' ? 'selected' : '' ?>>Online</option>
    </select>
    <span class="error"><?= $errores['evento'] ?></span><br>

    <!-- Aceptación de los términos -->
    <input type="checkbox" name="terminos" value="1" <?= $usuario['terminos'] ? 'checked' : '' ?>> Acepto los términos y condiciones.
    <span class="error"><?= $errores['terminos'] ?></span><br>

    <input type="submit" value="Registrar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$invalid) { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($usuario); ?></pre>
<?php } ?>

<?php include 'includes/footer.php'; ?>
