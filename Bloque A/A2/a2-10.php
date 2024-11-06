<?php
$price = 1.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop - Higher Counter</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Large Orders</h2>
    <p>
        <?php
        //Paso 2, actualiza la condición para mostrar los precios de hasta 200 paquetes
        for ($i = 10; $i <= 200; $i =$i + 10){
            echo $i;
            echo ' packs costs $';
            echo $price * $i;
            echo '<br>';
        }
        ?>
    </p>
</body>
</html>