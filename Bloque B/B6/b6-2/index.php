<?php
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokio'  => 'Shinjuku, 3-20-2 Nishishinjuku, 163-8001',
];

$city = $_GET['city'] ?? ''; // Obtiene el valor de 'city' o una cadena vacía si no está presente

if ($city) {
    $address = $cities[$city];
} else {
    $address = 'Please select a city';
}
?>
<?php include '../Recursos/includes/header.php' ?>

<?php foreach ($cities as $key => $value) { ?>
  <a href="get-2.php?city=<?= $key ?>"><?= $key ?></a>
<?php } ?>

<h1><?= $city ?></h1>
<p><?= $address ?></p>

<?php include '../Recursos/includes/footer.php' ?>
