<?php
$cliente = [
    'nombreCompleto' => '',
    'correoElectronico' => '',
    'edad' => '',
    'tipoLibro' => '',
    'privacidad' => '',
];
$error = [
    'nombreCompleto' => '',
    'correoElectronico' => '',
    'edad' => '',
    'tipoLibro' => '',
    'privacidad' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente['nombreCompleto'] = $_POST['nombreCompleto'] ?? '';
    $cliente['correoElectronico'] = $_POST['correoElectronico'] ?? '';
    $cliente['edad'] = $_POST['edad'] ?? '';
    $cliente['tipoLibro'] = $_POST['tipoLibro'] ?? '';
    $cliente['privacidad'] = $_POST['privacidad'] ?? '';

    $error['nombreCompleto'] = preg_match('/^[a-zA-Z\s]{2,50}$/', $cliente['nombreCompleto']) ? '' : 'ERROR: Nombre debe tener entre 2 y 50 letras.';
    $error['correoElectronico'] = filter_var($cliente['correoElectronico'], FILTER_VALIDATE_EMAIL) ? '' : 'ERROR: Correo no válido.';
    $error['edad'] = (is_numeric($cliente['edad']) && $cliente['edad'] >= 14) ? '' : 'ERROR: Edad debe ser un número mayor o igual a 14.';
    $error['tipoLibro'] = in_array($cliente['tipoLibro'], ['Fisico', 'Digital']) ? '' : 'ERROR: Seleccione un tipo de libro válido.';
    $error['privacidad'] = !empty($cliente['privacidad']) ? '' : 'ERROR: Debe aceptar la privacidad.';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Método POST</title>
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
<form method="post" action="">
    Nombre completo: <input type="text" name="nombreCompleto" value="<?= htmlspecialchars($cliente['nombreCompleto']) ?>">
    <span class="error"><?= $error['nombreCompleto'] ?></span><br>

    Correo electrónico: <input type="text" name="correoElectronico" value="<?= htmlspecialchars($cliente['correoElectronico']) ?>">
    <span class="error"><?= $error['correoElectronico'] ?></span><br>

    Edad: <input type="number" name="edad" value="<?= htmlspecialchars($cliente['edad']) ?>">
    <span class="error"><?= $error['edad'] ?></span><br>

    Tipo de libro:
    <select name="tipoLibro">
        <option value="">Seleccione...</option>
        <option value="Fisico" <?= $cliente['tipoLibro'] === 'Fisico' ? 'selected' : '' ?>>Fisico</option>
        <option value="Digital" <?= $cliente['tipoLibro'] === 'Digital' ? 'selected' : '' ?>>Digital</option>
    </select>
    <span class="error"><?= $error['tipoLibro'] ?></span><br>

    <input type="checkbox" name="privacidad" value="1" <?= $cliente['privacidad'] ? 'checked' : '' ?>> Acepto la privacidad.
    <span class="error"><?= $error['privacidad'] ?></span><br>

    <input type="submit" value="Enviar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !in_array('', $error, true)): ?>
    <h3>Datos procesados correctamente:</h3>
    <p>Nombre: <?= htmlspecialchars($cliente['nombreCompleto']) ?></p>
    <p>Correo: <?= htmlspecialchars($cliente['correoElectronico']) ?></p>
    <p>Edad: <?= htmlspecialchars($cliente['edad']) ?></p>
    <p>Tipo de libro: <?= htmlspecialchars($cliente['tipoLibro']) ?></p>
    <p>Privacidad aceptada.</p>
<?php endif; ?>

</body>
</html>
