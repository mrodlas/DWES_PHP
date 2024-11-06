<?php
//Paso 1, cambia el valor de $day a Wednesday
$day = 'Wednesday';

switch ($day){
    case 'Monday':
        $offer = '20% off chocolates';
        break;
    case 'Tuesday':
        $offer = '20% off mints';
        break;
    //Paso 5, agrega una sentencia para el caso 'Wednesday'
    case 'Wednesday':
        $offer = '20% off marshmallows';
        break;
    default:
        $offer = 'Buy three packs, get one free';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Statement</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Offers on <?= $day; ?></h2>
        <p><?= $offer ?></p>
    </body>
</html>