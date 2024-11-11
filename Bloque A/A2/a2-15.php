<?php
// Datos del usuario y del club
$nombreSocio = 'Carlos';
$saludo = '¡Bienvenido al Club Deportivo!';
if ($nombreSocio) {
    $saludo = '¡Bienvenido de nuevo, ' . $nombreSocio . '!';
}

$cuotaMensual = 50; // Cuota estándar mensual en euros

// Cálculo de los descuentos por meses de inscripción
for ($meses = 1; $meses <= 12; $meses++) {
    $subtotal = $cuotaMensual * $meses;
    $descuento = ($subtotal / 100) * ($meses * 3); // Descuento del 3% por mes
    $totales[$meses] = $subtotal - $descuento;
}
?>

<?php require_once 'includes/headerFinal.php'; ?>

<p><?= $saludo ?></p>
<h2>Cuota Mensual del Club Deportivo</h2>
<table>
    <tr>
        <th>Meses de Inscripción</th>
        <th>Precio con Descuento</th>
    </tr>
    <?php foreach ($totales as $meses => $precio) { ?>
        <tr>
            <td><?= $meses ?> mes<?= ($meses === 1) ? '' : 'es' ?></td>
            <td><?= number_format($precio, 2) ?> €</td>
        </tr>
    <?php } ?>
</table>

<?php require_once 'includes/footerFinal.php'; ?>
