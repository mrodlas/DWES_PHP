<?php
$stock_chocolate = 10;
$stock_toffee = 5;

function get_stockChocolate_message($stock_chocolate){
    if ($stock_chocolate > 10){
        return 'Good availability';
    } 
    if ($stock_chocolate > 0 && $stock_chocolate < 10){
        return 'Low stock';
    }
    if($stock_chocolate == 10){
        return ' Exactly 10 items in stock';
    }
    return 'Out of stock';
}
function get_stockToffee_message($stock_toffee){
    if ($stock_toffee > 10){
        return 'Good availability';
    } 
    if ($stock_toffee > 0 && $stock_toffee < 10){
        return 'Low stock';
    }
    if($stock_toffee == 10){
        return ' Exactly 10 items in stock';
    }
    return 'Out of stock';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Multiple Return Statements</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolates</h2>
        <p><?= get_stockChocolate_message($stock_chocolate) ?></p>
        <h2>Toffees</h2>
        <p><?= get_stockToffee_message($stock_toffee) ?></p>
        <table>
            <tr>
                <th>Candy</th>
                <th>Stock</th>
            </tr>
            <tr>
                <td>Chocolate</td>
                <td><?= $stock_chocolate ?></td>
            </tr>
            <tr>
                <td>Toffee</td>
                <td><?= $stock_toffee ?></td>
            </tr>   
        </table>
    </body>
    </html>