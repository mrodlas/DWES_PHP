<?php
$stock = 25 ;

if ($stock >= 10){
    $message = 'Good avaliability';
}
if ($stock > 0 && $stock < 10){
    $message = 'Low stock';
}
if ($stock < 0){
    $message = 'Out of stock';
}
?>
<?php require_once 'includes/header.php'; ?>
<h2>Chocolate</h2>
<p><?= $message ?></p>
<?php require_once 'includes/footer.php'; ?>