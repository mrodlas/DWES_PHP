<?php
//Paso 1, añade dos elementos mas al array
$products = [
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Chocolate' => 1.99,
    'Marshmallows' => 2.99,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Loop</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Price List</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $item => $price){ ?>
            <tr>
                <td><?= $item ?></td>
                <td>$<?= $price ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>