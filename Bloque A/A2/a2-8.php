<?php
//Paso 1, cambia el valor de $packs a 10
$packs = 10;
//Cambia el valor de $price a 2.99
$price = 2.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do while Loop</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple Packs</h2>
    <p>
        <?php
        do {
            echo $packs;
            echo ' packs costs $';
            echo $price * $packs;
            echo '<br>';
            $packs--;
        } while ($packs > 0);
        ?>
    </p>
</body>