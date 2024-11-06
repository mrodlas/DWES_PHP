<?php
//Paso 1, cambia el valor de $stock a 0
$stock = 0;

//Paso 2, cambia el mensaje a "More stock coming soon"
$message = ($stock > 0) ? 'In stock' : 'More stock coming soon';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Operator</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>
</html>