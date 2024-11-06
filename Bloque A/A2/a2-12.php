<?php
//Paso 1, añade dos elementos mas al array
$best_sellers = ['Toffee', 'Mints', 'Fudge', 'Chocolate', 'Marshmallows'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Loop - Just Accessing Values</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    <ul>
        <!--Paso 2 y 3 cambia el nombre de la variable de $product a $candy-->
        <?php foreach ($best_sellers as $candy){ ?>
            <p><?= $candy ?></p>
        <?php } ?>
    </ul>
</body>
</html>