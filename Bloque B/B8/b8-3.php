<?php
// Fecha inicial del evento
$evento = DateTime::createFromFormat("d/m/Y H:i:s", "16/10/2024 15:30:00");

// Mostrar fecha inicial
$fecha_inicial = $evento->format("Y-m-d H:i:s");

// Cambiar la fecha del evento usando setDate()
$evento->setDate(2024, 11, 20); // Se cambia al 20 de noviembre de 2024
$fecha_modificada = $evento->format("Y-m-d H:i:s");

// Cambiar la hora del evento usando setTime()
$evento->setTime(18, 45, 00); // Se cambia a las 18:45:00
$hora_modificada = $evento->format("Y-m-d H:i:s");

// Ajustar la fecha del evento a partir de un timestamp UNIX usando setTimestamp()
$timestamp_unix = 1734562800; // Equivale a 18/12/2024 12:00:00
$evento->setTimestamp($timestamp_unix);
$fecha_desde_timestamp = $evento->format("Y-m-d H:i:s");

// Modificar la fecha utilizando modify() para sumar o restar días y horas
$evento->modify("+3 days +2 hours"); // Se suma 3 días y 2 horas
$fecha_modificada_final = $evento->format("Y-m-d H:i:s");
?>

<?php include 'includes/header.php'; ?>
<h2>Ajuste de Fecha y Hora del Evento</h2>
<p><b>Fecha inicial del evento:</b> <?= $fecha_inicial ?></p>
<p><b>Fecha después de cambiar con setDate():</b> <?= $fecha_modificada ?></p>
<p><b>Hora después de cambiar con setTime():</b> <?= $hora_modificada ?></p>
<p><b>Fecha ajustada desde un timestamp UNIX:</b> <?= $fecha_desde_timestamp ?></p>
<p><b>Fecha después de modificar con modify():</b> <?= $fecha_modificada_final ?></p>
<?php include 'includes/footer.php'; ?>
