<?php
$item = 'Chocolate';
$stock = 8;
$wanted = 12;
$deliver = true;
$can_buy = ($wanted <= $stock) && ($deliver == true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparison Operator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p>Item: <?= $item; ?></p>
    <p>Stock: <?= $stock; ?></p>
    <p>Wanted: <?= $wanted; ?></p>
    <p>Can Buy: <?= $can_buy; ?></p>
</body>
</html>