<?php
declare(strict_types=1);

$libros = [
    ['titulo' => '1984', 'precio' => 18.50, 'stock' => 15],
    ['titulo' => 'Fahrenheit 451', 'precio' => 12.00, 'stock' => 8],
    ['titulo' => 'El gran Gatsby', 'precio' => 14.75, 'stock' => 20],
    ['titulo' => 'Matar a un ruiseñor', 'precio' => 22.30, 'stock' => 12],
    ['titulo' => 'Orgullo y prejuicio', 'precio' => 10.60, 'stock' => 25]
];

$tasa_impuesto = 12; 

function obtener_stock_total(array $libros): int
{
    $total_stock = 0;
    foreach ($libros as $libro) {
        $total_stock += $libro['stock'];
    }
    return $total_stock;
}

function obtener_valor_inventario(float $precio, int $stock): float
{
    return $precio * $stock;
}

function calcular_impuesto(float $valor_inventario, float $tasa_impuesto): float
{
    return $valor_inventario * ($tasa_impuesto / 100);
}

$valor_inventario_total = 0;
foreach ($libros as &$libro) {
    $libro['valor_inventario'] = obtener_valor_inventario($libro['precio'], $libro['stock']);
    $valor_inventario_total += $libro['valor_inventario'];
}
$total_impuesto = calcular_impuesto($valor_inventario_total, $tasa_impuesto);
$total_stock = obtener_stock_total($libros);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario de Librería</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Gestión de Inventario de Librería</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Precio (€)</th>
                <th>Stock</th>
                <th>Valor en Inventario (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= htmlspecialchars($libro['titulo']) ?></td>
                    <td><?= number_format($libro['precio'], 2, ',', '.') ?></td>
                    <td><?= $libro['stock'] ?></td>
                    <td><?= number_format($libro['valor_inventario'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Resumen</h2>
    <p>Total de libros en stock: <?= $total_stock ?></p>
    <p>Valor total del inventario: €<?= number_format($valor_inventario_total, 2, ',', '.') ?></p>
    <p>Total de impuestos a pagar (<?= $tasa_impuesto ?>%): €<?= number_format($total_impuesto, 2, ',', '.') ?></p>
</body>
</html>
