
<?php
declare(strict_types = 1);                                    // Tipos estrictos
require 'includes/validate.php';                              // Validar functions

$user = [
    'email'  => '',
    'edad'   => '',
    'terminos' => '',
];                                                            // Inicializar $user array

$errors = [
    'email'  => '',
    'edad'   => '',
    'terminos' => '',
];                                                            // Inicializar errors array
$mensaje = '';                                                // Inicializar mensaje

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                   // si se envio un formulario
    $user['email']  = $_POST['email'];                          // obtener email
    $user['edad']   = $_POST['edad'];                           // Obtener edad luego comprobar terminos
    $user['terminos'] = (isset($_POST['terminos']) and $_POST['terminos'] == true) ? true : false;

    $errors['email']  = is_email($user['email'])   ? '' : 'Debe tener la estructura de un email';
    $errors['edad']   = is_number($user['edad'], 18, 100) ? '' : 'Debes ser mayor de 18 años';
    $errors['terminos'] = $user['terminos']                  ? '' : 'Debes aceptar los terminos y condiciones'; // Validate data

    $invalid = implode($errors);                              // Unir error mensajes
    if ($invalid) {                                           // Hay errores
        $mensaje = 'Por favor corrige los siguientes errores';    // No se puede procesar
    } else {                                                  // No hay errores
        $mensaje = 'Datos correctos';                     // Se puede procesar
    }
}
?>
<?php include 'includes/header.php'; ?>

<?= $mensaje ?>
<form action="11_newsletter.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>">
  <span class="error"><?= $errors['email'] ?></span><br>
  Edad:  <input type="text" name="edad" value="<?= htmlspecialchars($user['edad']) ?>">
  <span class="error"><?= $errors['edad'] ?></span><br>
  <input type="checkbox" name="terminos" value="true" <?= $user['terminos'] ? 'checked' : '' ?>>
  Acepto los terminos y condiciones
  <span class="error"><?= $errors['terminos'] ?></span><br>
  <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
