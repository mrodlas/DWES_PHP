<?php
$asignatura   = '';
$mensaje = '';
$asignaturas = [
    "Matemáticas",
    "Física",
    "Historia",
    "Arte",
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $asignatura   = $_POST['asignatura'] ?? '';
    $nombre       = $_POST['nombre'] ?? '';
    $apellido     = $_POST['apellido'] ?? '';
    $valid   = in_array($asignatura, $asignaturas);
    $mensaje = $valid ? 'Gracias' : 'Selecciona una asignatura';
}
?>
<?php include 'includes/header.php'; ?>

<?= $mensaje ?>
<form action="09_optativas.php" method="POST">
    <p>Nombre: <input type="text" name="nombre"></p>
    <p>Apellido: <input type="text" name="apellido"></p>
    Seleccione una asignatura optativa:
    <?php foreach ($asignaturas as $option) { ?>
        <?= $option ?> <input type="radio" name="asignatura"
            value="<?= $option ?>"
            <?= ($asignatura == $option) ? 'checked' : '' ?>>
    <?php } ?>
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>