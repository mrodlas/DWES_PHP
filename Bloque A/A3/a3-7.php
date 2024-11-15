<?php
$price = '1';
$quantity = 3;

function calculate_total(int $price, int $quantity): int{
    return $price * $quantity;
}

$total = calculate_total($price, $quantity);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Global and Static Variables</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolates</h2>
        <p>Total $<?= $total ?></p>
    </body>
</html>