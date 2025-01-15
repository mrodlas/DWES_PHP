
<?php
$eventos = ['Ceremonia de apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de clausura'];
$evento   = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $evento   = (isset($_POST['evento']) and $_POST['evento'] == true) ? true : false;
    $mensaje = $evento ? 'Thank you' : 'You must agree to the evento and conditions';
}
?>

<?php include 'includes/header.php'; ?>

<?= $mensaje ?>
<form action="10_voluntarios.php" method="POST">
    <?php foreach ($eventos as $evento): ?>
        <input type="checkbox" name="evento" value="<?= $evento ?>"><?= $evento ?><br>
    <?php endforeach; ?>
    <?= $evento ? 'checked' : '' ?>>
  <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
