<?php
$us_price = 4;
$rates = [
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'aud' => 1.30,
    'cad' => 1.25,
];

function calculate_prices($usd, $exchange_rates){
    $prices = [
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        'dolar australiano' => $usd * $exchange_rates['aud'],
        'dolar canadiense' => $usd * $exchange_rates['cad'],
    ];
    return $prices;
}

$globar_prices = calculate_prices($us_price, $rates);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Global and Static Variables</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Candy Prices</h2>
        <p>US $<?= $us_price ?></p>
        <p>(UK &pound;<?= $globar_prices['pound'] ?> |
            EU &euro;<?= $globar_prices['euro'] ?> |
            JP &yen;<?= $globar_prices['yen'] ?> |
            AUD &dollar;<?= $globar_prices['dolar australiano'] ?> |
            CAD &dollar;<?= $globar_prices['dolar canadiense'] ?>)</p>
        <table>
            <tr>
                <th>Candy</th>
                <th>Pounds</th>
                <th>Euros</th>
                <th>Yen</th>
                <th>Aud</th>
                <th>Cad</th>
            </tr>
            <tr>
                <td>Chocolate</td>
                <td><?= $globar_prices['pound'] ?></td>
                <td><?= $globar_prices['euro'] ?></td>
                <td><?= $globar_prices['yen'] ?></td>
                <td><?= $globar_prices['dolar australiano'] ?></td>
                <td><?= $globar_prices['dolar canadiense'] ?></td>
            </tr>
            <tr>
                <td>Toffee</td>
                <td><?= $globar_prices['pound'] ?></td>
                <td><?= $globar_prices['euro'] ?></td>
                <td><?= $globar_prices['yen'] ?></td>
                <td><?= $globar_prices['dolar australiano'] ?></td>
                <td><?= $globar_prices['dolar canadiense'] ?></td>
            </tr>   
        </table>
    </body>
</html>