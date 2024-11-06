<?php
//Paso 1, cambia el valor a 'Tuesday'
//Paso 1, vuelve a cambiar el valor a 'Wednesday'
$day = 'Wednesday';

$offer = match ($day) {
    'Monday' => '20% off chocolates',
    'Tuesday' => '20% off mints',
    'Saturday' , 'Sunday' => '20% off mints',
    //Se elimina la opcion por defecto (aparecerá un error)
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Expression</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Offers on <?= $day; ?></h2>
        <p><?= $offer ?></p>
    </body>
</html> 