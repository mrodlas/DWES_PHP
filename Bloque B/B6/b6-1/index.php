<?php
// Array de productos con sus nombres y descripciones
$products = [
    'Portátil' => [
        'description' => 'Un ordenador portátil de alto rendimiento para trabajo y juegos.',
        'price' => '$1200',
        'availability' => 'In stock',
    ],
    'Teléfono inteligente' => [
        'description' => 'Un smartphone con las últimas características y una gran cámara.',
        'price' => '$800',
        'availability' => 'Out of stock',
    ],
    'Auriculares' => [
        'description' => 'Auriculares con buena calidad de sonido y cancelación de ruido.',
        'price' => '$150',
        'availability' => 'In stock',
    ],
];
?>

<?php include '../Recursos/includes/header.php' ?>

<ul>
    <?php foreach ($products as $product => $description) { ?>
        <li>
            <a href="product.php?product=<?= $product ?>"><?= $product ?></a>
        </li>
    <?php } ?>
</ul>

<?php include '../Recursos/includes/footer.php' ?>

