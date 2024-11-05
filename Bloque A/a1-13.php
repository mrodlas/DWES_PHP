<?php
// Datos del restaurante y oferta
$nombreCliente = 'Laura';
$saludoPersonalizado = "¡Hola, $nombreCliente! Bienvenida a nuestra promoción especial.";
$platoEspecial = [
    'nombre' => 'Pizza Margarita',
    'cantidad' => 2,
    'precio_unitario' => 10,
    'precio_descuento_unitario' => 8,
];

// Cálculo de precios y ahorros
$precioOriginalTotal = $platoEspecial['cantidad'] * $platoEspecial['precio_unitario'];
$precioConDescuentoTotal = $platoEspecial['cantidad'] * $platoEspecial['precio_descuento_unitario'];
$ahorroTotal = $precioOriginalTotal - $precioConDescuentoTotal;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta Especial - Restaurante La Delicia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e0;
            padding: 20px;
        }
        h1, h2 {
            color: #d2691e;
        }
        .oferta {
            background-color: #EADFCE;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .precio, .ahorro {
            font-weight: bold;
            color: #d2691e;
        }
    </style>
</head>
<body>
    <h1>Restaurante La Delicia</h1>
    <h2>Promoción Exclusiva</h2>

    <p><?= $saludoPersonalizado; ?></p>
    <div class="oferta">
        <p>Disfruta de <?= $platoEspecial['cantidad']; ?> <?= $platoEspecial['nombre']; ?>s por un precio especial.</p>
        <p class="precio">Precio con descuento: $<?= $precioConDescuentoTotal; ?> (precio regular $<?= $precioOriginalTotal; ?>)</p>
        <p class="ahorro">¡Te ahorras $<?= $ahorroTotal; ?>!</p>
    </div>
</body>
</html>
