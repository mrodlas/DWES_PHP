
<?php
$form['email'] = '';                                                  // Inicializar email
$form['age']   = '';
$form['url']   = '';                                                  // Inicializar age

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                           // Si se envio un formulario
    $filters['email']                       = FILTER_VALIDATE_EMAIL;  // Email filtro
    $filters['age']['filter']               = FILTER_VALIDATE_INT;    // Integer filtro
    $filters['age']['options']['min_range'] = 18;                     // Min value 18
    $filters['age']['options']['max_range'] = 65;                     // Max value 100
    $filters['url']                         = FILTER_VALIDATE_URL;    // URL filtro
    $form = filter_input_array(INPUT_POST, $filters);                 // Validar datos del formulario
}
?>
<?php include 'includes/header.php'; ?>

<form action="14_validarFormulario_filter_input.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Age: <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  URL: <input type="text" name="url" value="<?= htmlspecialchars($form['url']) ?>"><br>
  I agree to the terms and conditions: <input type="checkbox" name="terms" value="1"><br>
  <input type="submit" value="Save">
</form>
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
