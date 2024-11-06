<?php
//Paso 1, cambia el valor de $price a 2.99
$price = 1.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple Packs</h2>
    <p>
        <?php
        //Paso 2, haz que el bucle se repita 20
        for ($i = 1; $i <= 20; $i++){
            echo $i;
            echo ' packs costs $';
            echo $price * $i;
            echo '<br>';
        }
        ?>
    </p>
</body>
</html>