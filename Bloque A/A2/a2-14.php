<?php
$name = 'Ivy';

$greeting = 'Hello';
if ($name ){
    $greeting = 'Welcome back, '. $name;
}
$product = 'Lolipop';
//Cambia el valor de $cost a 10
$cost = 10;

//Actualiza el bucle para que se ejecute 20 veces, mostrando hasta 20 packs
for($i = 1; $i <= 20; $i++){
    $subtotal = $cost * $i;
    $discount = ($subtotal /100) * ($i * 4);
    $totals[$i] = $subtotal - $discount;
}
?>

<?php require_once 'includes/header.php'; ?>

<p> <?= $greeting ?></p>
<h2><?= $product ?></h2>
<table>
    <tr>
        <th>Packs</th>
        <th>Price</th>
    </tr>
    <?php foreach($totals as $quantity => $price){ ?>
        <tr>
            <td><?= $quantity ?> pack<?= ($quantity === 1) ? '' : 's' ?></td>
            <td><?= $price ?></td>
        </tr>
    <?php } ?>
</table>

<?php require_once 'includes/footer.php'; ?>