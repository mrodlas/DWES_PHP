<?php
// Creamos los arrays
$usuario = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$error = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$datos = [];

// Validacion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $filtros=['nombre'] = FILTER_CALLBACK; ////funcion personalizada
    $filtros = ['edad']['filtro'] = FILTER_VALIDATE_INT;
    $filtros = ['edad']['opcion']['min_rango'] = 18;
    $filtros = ['edad']['opcion']['max_rango'] = 65;
    $filtros = ['correo'] = FILTER_VALIDATE_EMAIL;
    // $filtros=['telefono'] = FILTER_CALLBACK; //funcion personalizada
    // $filtros=['sms'] = FILTER_CALLBACK; //funcion personalizada

    // Validar entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Validar los errores

    $error['nombre'] = $formulario['nombre'] ? '' : 'Debe de escribir un nombre';
    $error['edad'] = $formulario['edad'] ? '' : 'La edad debe estar entre 18 y 65 años';
    $error['correo'] = $formulario['correo'] ? '' : 'El correo no es valido';
    $error['telefono'] = $formulario['telefono'] ? '' : 'El telefono no es correcto';
    $error['sms'] = $formulario['sms'] ? '' : 'Debe de tener al menos 3 caracteres';
}
?>
<?php include 'includes/header.php' ?>
<h1>Formulario de contacto</h1>
<form action="filtroSaneamiento.php" method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
    <span style="color: red;" class="error"><?= $error['nombre'] ?></span><br>

    Edad: <input type="text" name="edad" value="<?= $usuario['edad'] ?>">
    <span style="color: red;" class="error"><?= $error['edad'] ?></span><br>

    Correo: <input type="text" name="correo" value="<?= $usuario['correo'] ?>">
    <span style="color: red;" class="error"><?= $error['correo'] ?></span><br>

    Telefono: <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>">
    <span style="color: red;" class="error"><?= $error['elefono'] ?></span><br>

    Mensaje: <input type="text" name="sms" value="<?= $usuario['sms'] ?>">
    <span style="color: red;" class="error"><?= $error['sms'] ?></span><br>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<?php include 'includes/footer.php' ?>