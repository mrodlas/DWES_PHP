<?php
//Cambia en el paso 1 el valor almacenado en $stock a 0
$stock = 0;

if ($stock > 0){
    $message = 'In stock';
} else{
    //Paso 5, cambia el mensaje a "More stock coming soon"
    $message = 'More stock coming soon';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If else Statement</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolate</h2>
        <p><?= $message ?></p>
    </body>
</html>