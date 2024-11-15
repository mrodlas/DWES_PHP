<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0){
    $cost = $cost * $quantity;      // Cálculo del costo total por cantidad
    $tax = $cost * ($tax / 100);    // Cálculo del impuesto
    $total_cost = ($cost + $tax) - $discount; // Cálculo del costo después de descuento e impuestos
    return $total_cost + $shipping;  // Añadir el costo del envío
}

// Definir los productos y sus parámetros
$products = [
    ['name' => 'Dark Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 2, 'tax' => 5, 'shipping' => 3],
    ['name' => 'Milk Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 0, 'tax' => 5, 'shipping' => 0],
    ['name' => 'White Chocolate', 'cost' => 10, 'quantity' => 5, 'discount' => 0, 'tax' => 5, 'shipping' => 0],
    ['name' => 'Chocolate Truffles', 'cost' => 8, 'quantity' => 4, 'discount' => 3, 'tax' => 10, 'shipping' => 5],
    ['name' => 'Fudge', 'cost' => 3, 'quantity' => 10, 'discount' => 0, 'tax' => 10, 'shipping' => 0],
    ['name' => 'Snickers', 'cost' => 2, 'quantity' => 15, 'discount' => 4, 'tax' => 5, 'shipping' => 2]
];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Default Values for Parameters</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolates</h2>
        <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Cost per Unit</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Shipping</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td>$<?= $product['cost'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td>$<?= $product['discount'] ?></td>
                    <td><?= $product['tax'] ?>%</td>
                    <td>$<?= $product['shipping'] ?></td>
                    <td>$<?= calculate_cost(
                        $product['cost'],
                        $product['quantity'],
                        $product['discount'],
                        $product['tax'],
                        $product['shipping']
                    ) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>    
</html> 
