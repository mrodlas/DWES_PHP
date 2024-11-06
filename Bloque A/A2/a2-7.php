<?php
$counter = 1;
//Paso 2, aumenta el número de paquetes a 10
$packs = 10;
$price = 1.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While Loop</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple Packs</h2>
    <p>
        <?php
        //Paso 4, cambia el operador a < en lugar de <=
        while ($counter < $packs){
            echo $counter;
            echo ' packs costs $';
            echo $price * $counter;
            echo '<br>';
            $counter++;
        }
        ?>
    </p>
</body>
</html>