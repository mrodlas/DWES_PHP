<?php
// Variables: Datos de entrada simulados
$nombre = " Juan Pérez  "; // Contiene espacios adicionales
$correo = "  JUAN.PEREZ@CORREO.COM  "; // En mayúsculas y con espacios
$mensaje = "Este mensaje es URGENTE. Por favor, resuélvelo de inmediato. Evita retrasos URGENTE."; 

// 1. Mostrar los Datos Originales
$datosOriginales .= "Nombre: $nombre<br>";
$datosOriginales .= "Correo: $correo<br>";
$datosOriginales .= "Mensaje: $mensaje<br>";

// 2. Eliminar Espacios en Blanco Adicionales
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// 3. Asegurar que el Correo Está en Minúsculas
$correo = strtolower($correo);

// 4. Reemplazar Palabras Inapropiadas en el Mensaje
$mensaje = str_replace('retrasos', '****', $mensaje);

// 5. Reemplazo Insensible a Mayúsculas/Minúsculas
$mensaje = str_ireplace('urgente', 'Prioridad Alta', $mensaje);

// 6. Repetir una Cadena para Enfatizar
$mensaje = $mensaje . str_repeat("!!!", 3);

// 7. Mostrar los Datos Procesados
$datosProcesados .= "Nombre: $nombre<br>";
$datosProcesados .= "Correo: $correo<br>";
$datosProcesados .= "Mensaje: $mensaje<br>";
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Mostramos los datos originales -->
<h2>Datos Originales</h2>
<p><?= $datosOriginales ?></p>

<hr>

<!-- Mostramos los datos procesados -->
<h2>Datos Procesados</h2>
<p><?= $datosProcesados ?></p>

<?php include './includes/footer.php'; ?>
