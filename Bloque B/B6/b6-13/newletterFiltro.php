
<?php
declare(strict_types = 1);                                    // Enable strict tpes
require 'includes/validate.php';

$form = filter_input_array(INPUT_POST);

$user = [
    'email'  => '',
    'edad'   => '',
    'terminos' => '',
];                                                            // Inicializr $user array

$errors = [
    'email'  => '',
    'edad'   => '',
    'terminos' => '',
];                                                            // Inicializar errors array
$mensaje = '';                                                // Inicializar mensaje

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                   // Si se envio un formulario
    $user['email']  = $_POST['email'];                          // Obtener email
    $user['edad']   = $_POST['edad'];                           // Obtener edad luego comprobar los terminos
    $user['terminos'] = (isset($_POST['terminos']) and $_POST['terminos'] == true) ? true : false;

    $errors['email']  = is_email($user['email'])   ? '' : 'Debe tener la estructura de un email';
    $errors['edad']   = is_number($user['edad'], 18, 100) ? '' : 'Debes ser mayor de 18 años';
    $errors['terminos'] = $user['terminos']                  ? '' : 'Debes aceptar los terminos y condiciones';     // Validar datos

    $invalid = implode($errors);                              // Unit error mensajes
    if ($invalid) {                                           // Si hay errores
        $mensaje = 'Por favor corrige los siguientes errores';    // No se puede procesar
    } else {                                                  // Si no hay errores
        $mensaje = 'Datos correctos';                     // Se puede procesar
    }
}
?>
<?php include 'includes/header.php'; ?>

<?= $mensaje ?>
<form action="12_newsletter_filtro.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>">
  <span class="error"><?= $errors['email'] ?></span><br>
  Edad:  <input type="text" name="edad" value="<?= htmlspecialchars($user['edad']) ?>">
  <span class="error"><?= $errors['edad'] ?></span><br>
  <input type="checkbox" name="terminos" value="true" <?= $user['terminos'] ? 'checked' : '' ?>>
  Acepto los terminos y condiciones
  <span class="error"><?= $errors['terminos'] ?></span><br>
  <input type="submit" value="Save">
</form>
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
