
<?php
$form['email'] = '';                                                  // Inicializar email
$form['age']   = '';
$form['url']   = '';  
$form['terms'] = 0;  

$data          = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                           // Si se envio un formulario
    $filters['email']                       = FILTER_VALIDATE_EMAIL;  // Email filtro
    $filters['age']['filter']               = FILTER_VALIDATE_INT;    // Integer filtro
    $filters['age']['options']['min_range'] = 18;                     // Min value 18
    $filters['age']['options']['max_range'] = 65;                     // Max value 100
    $filters['url']                         = FILTER_VALIDATE_URL;
    $filters['terms']                       = FILTER_VALIDATE_BOOLEAN;    
    $form = filter_input_array(INPUT_POST);                 // Obtener datos del formulario
    $data = filter_var_array($form, $filters);              // Validar datos del formulario
}
?>
<?php include 'includes/header.php'; ?>

<form action="15_validarVariables.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Age: <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  URL: <input type="text" name="url" value="<?= htmlspecialchars($form['url']) ?>"><br>
  I agree to the terms and conditions: <input type="checkbox" name="terms" value="1"><br>
  <input type="submit" value="Save">
</form>
<pre><?php var_dump($data); ?></pre>

<?php include 'includes/footer.php'; ?>
