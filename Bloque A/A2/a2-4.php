<?php
//Paso 1, cambia el valor de $stock a 0
$stock = 0;
$ordered = 3;

if ($stock > 0){
    $message = 'In stock';
} elseif ($ordered > 0){
    $message = 'Coming soon';
} else{
    $message = 'Sold out';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If elseif else Statement</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolate</h2>
        <p><?= $message ?></p>
    </body>
</html>