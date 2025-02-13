<?php
// Obtener las fechas de inicio y fin del evento desde el usuario (simulando entrada de usuario)
$fecha_inicio_usuario = "16/10/2024 15:30:00";
$fecha_fin_usuario = "18/10/2024 18:00:00";

// Convertir las fechas de entrada en objetos DateTime
$fecha_inicio_obj = DateTime::createFromFormat("d/m/Y H:i:s", $fecha_inicio_usuario);
$fecha_fin_obj = DateTime::createFromFormat("d/m/Y H:i:s", $fecha_fin_usuario);

// Calcular la diferencia entre las fechas usando DateInterval
$intervalo = $fecha_inicio_obj->diff($fecha_fin_obj);

// Mostrar la duración en un formato personalizado
$duracion_formateada = $intervalo->format('%d días, %h horas, %i minutos');

// Calcular el número total de horas y minutos
$horas_totales = $intervalo->days * 24 + $intervalo->h;
$minutos_totales = $horas_totales * 60 + $intervalo->i;

?>

<?php include 'includes/header.php'; ?>
<h2>Duración del Evento</h2>
<p><b>Fecha de inicio:</b> <?= $fecha_inicio_usuario ?></p>
<p><b>Fecha de fin:</b> <?= $fecha_fin_usuario ?></p>
<p><b>Duración del evento:</b> <?= $duracion_formateada ?></p>
<p><b>Duración total en horas y minutos:</b> <?= $horas_totales ?> horas y <?= $minutos_totales ?> minutos</p>
<?php include 'includes/footer.php'; ?>
