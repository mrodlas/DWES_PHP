<!-- Ejercicio 7. Comprobar que se ha enviado un formulario (Pag. 120) -->
<?php

// Validando con $_POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $posicion = $_POST['posicion'];
    $email = $_POST['email'];
    $tlf = $_POST['tlf'];

    $datos = 'Se ha registrado en Cordobita FC!<br>';
    $datos .= 'Nombre: ' . htmlspecialchars($nombre) . '<br>';
    $datos .= 'Apellido: ' . htmlspecialchars($apellido) . '<br>';
    $datos .= 'Edad: ' . htmlspecialchars($edad) . '<br>';
    $datos .= 'Posición: ' . htmlspecialchars($posicion) . '<br>';
    $datos .= 'E-mail: ' . htmlspecialchars($email) . '<br>';
    $datos .= 'Teléfono: ' . htmlspecialchars($tlf) . '<br>';
}


// Validando con $_GET
$submitted = $_GET['sent'] ?? '';

if($submitted === 'save'){
    $nombre = $_GET['nombre'] ?? '';
    $apellido = $_GET['apellido'] ?? '';
    $edad = $_GET['edad'] ?? '';
    $posicion = $_GET['posicion'] ?? '';
    $email = $_GET['email'] ?? '';
    $tlf = $_GET['tlf'] ?? '';

    $datos = 'Se ha registrado en Cordobita FC!<br>';
    $datos .= 'Nombre: ' . htmlspecialchars($nombre) . '<br>';
    $datos .= 'Apellido: ' . htmlspecialchars($apellido) . '<br>';
    $datos .= 'Edad: ' . htmlspecialchars($edad) . '<br>';
    $datos .= 'Posición: ' . htmlspecialchars($posicion) . '<br>';
    $datos .= 'E-mail: ' . htmlspecialchars($email) . '<br>';
    $datos .= 'Teléfono: ' . htmlspecialchars($tlf) . '<br>';
}
?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h1>Formulario de Registro para CordobitaFC</h1>

<form action="registro.php" method="POST">
    <p>Nombre:      <input type="text" name="nombre"></p>
    <p>Apellido:    <input type="text" name="apellido"></p>
    <p>Edad:        <input type="age" name="edad"></p>
    <p>Posición:    <input type="text" name="posicion"></p>
    <p>Email:       <input type="email" name="email"></p>
    <p>Teléfono:    <input type="number" name="tlf"></p>
    
    <p><input type="submit" name="sent" value="save"></p>
</form>

<!-- Mostrar Salida -->
<?php
if(isset($datos)){
    echo $datos;
}
?>


<?php include '../includes/footer.php'; ?>