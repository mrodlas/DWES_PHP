
<?php
// Configuración del filtro
$settings = [
    'flags' => FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE, // Evitar IPs privadas y reservadas
    'options' => ['default' => '0.0.0.0'], // Valor por defecto
];

// Validar entrada
$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP, $settings);
?>

<?php include 'includes/header.php'; ?>

<p>Ingrese una dirección IP válida (no se permiten privadas ni reservadas).</p>

<form action="13_validarIp.php" method="POST">
    Dirección IP: <input type="text" name="ip" value="<?= htmlspecialchars($ip, ENT_QUOTES, 'UTF-8') ?>">
    <input type="submit" value="Validar">
</form>

<p>Resultado de validación:</p>
<pre><?php var_dump($ip); ?></pre>

<?php include 'includes/footer.php'; ?>
