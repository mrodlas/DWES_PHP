<?php
// Array de productos con sus nombres y descripciones
$products = [
    'Portátil' => [
        'description' => 'Un ordenador portátil de alto rendimiento para trabajo y juegos.',
        'price' => '$1200',
        'availability' => 'En stock',
    ],
    'Teléfono inteligente' => [
        'description' => 'Un smartphone con las últimas características y una gran cámara.',
        'price' => '$800',
        'availability' => 'Fuera de stock',
    ],
    'Auriculares' => [
        'description' => 'Auriculares con buena calidad de sonido y cancelación de ruido.',
        'price' => '$150',
        'availability' => 'En stock',
    ],
];

// Validar si el parámetro 'product' existe en la URL
$product = $_GET['product'] ?? '';
$valid = array_key_exists($product, $products);

if ($valid) {
    $description = $products[$product];
} else {
    // Manejo de errores si el producto no está presente o no es válido
    $product = 'Producto no válido';
    $description = [
        'description' => 'El producto seleccionado no existe. Por favor, seleccione uno válido.',
        'price' => 'N/A',
        'availability' => 'No disponible',
    ];
}
?>

<?php include '../Recursos/includes/header.php' ?>

<h1><?= $product ?></h1>
<p><strong>Descripción:</strong> <?= $description['description'] ?></p>
<p><strong>Precio:</strong> <?= $description['price'] ?></p>
<p><strong>Disponibilidad:</strong> <?= $description['availability'] ?></p>
<a href="index.php">Volver</a>

<?php include '../Recursos/includes/footer.php' ?>
