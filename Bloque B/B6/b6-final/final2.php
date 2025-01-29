
<?php
// Definir arrays para el usuario, errores y datos procesados
$usuario = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => ''
];
$error = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => ''
];
$datos = [];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configurar filtros
    $filtros = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]{2,50}$/']
        ],
        'correo' => FILTER_VALIDATE_EMAIL,
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{9,}$/']
        ],
        'evento' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(Presencial|Online)$/']
        ],
        'terminos' => [
            'filter' => FILTER_VALIDATE_BOOLEAN,
            'flags' => FILTER_NULL_ON_FAILURE
        ]
    ];

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Evaluar los resultados de validación
    $error['nombre'] = $usuario['nombre'] ? '' : 'ERROR: Nombre debe tener solo letras y entre 2 y 50 caracteres.';
    $error['correo'] = $usuario['correo'] ? '' : 'ERROR: Correo debe ser una dirección válida.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'ERROR: El teléfono debe tener al menos 9 dígitos.';
    $error['evento'] = $usuario['evento'] ? '' : 'ERROR: Seleccione "Presencial" u "Online".';
    $error['terminos'] = $usuario['terminos'] ? '' : 'ERROR: Debe aceptar los términos y condiciones.';

    // Mostrar mensaje de éxito o errores
    $invalid = implode('', $error);
    $sms = $invalid ? 'Corrige los errores que se muestran en pantalla.' : 'Registro completado correctamente.';

    // Sanear datos
    if (!$invalid) {
        $datos['nombre'] = filter_var($usuario['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['correo'] = filter_var($usuario['correo'], FILTER_SANITIZE_EMAIL);
        $datos['telefono'] = filter_var($usuario['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $datos['evento'] = $usuario['evento']; // No necesita sanitización porque está validado
        // Aquí se enviarían los datos a la base de datos
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

 <!-- Mostrar resultados -->
 <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <div class="result <?= $invalid ? 'error' : 'success' ?>">
            <h3><?= htmlspecialchars($sms) ?></h3>
        </div>
    <?php } ?>

<?php include 'includes/footer.php'; ?>
