<?php
// Definir valores iniciales (simulando entrada del usuario en español)
$fecha_inicio_usuario = "16/02/2024 10:00:00"; // Fecha inicial
$duracion_usuario = "2 horas 30 minutos"; // Duración en español
$intervalo_repeticion = "P7D"; // Repetición cada 7 días
$periodo_meses = 2; // Duración de la recurrencia en meses

// Convertir la fecha de inicio en un objeto DateTime
$fecha_inicio_obj = DateTime::createFromFormat("d/m/Y H:i:s", $fecha_inicio_usuario);
if (!$fecha_inicio_obj) {
    die("Error: Formato de fecha de inicio inválido.");
}

// Convertir duración a inglés para que PHP la entienda
$duracion_usuario_ingles = str_replace(
    ["horas", "hora", "minutos", "minuto"], 
    ["hours", "hour", "minutes", "minute"], 
    $duracion_usuario
);

// Verificar si la duración es válida
$duracion_intervalo = DateInterval::createFromDateString($duracion_usuario_ingles);
if (!$duracion_intervalo) {
    die("Error: La duración del evento '{$duracion_usuario}' no es válida.");
}

// Crear intervalo de repetición
$intervalo = new DateInterval($intervalo_repeticion);

// Definir el fin del periodo (2 meses después del inicio)
$fecha_fin_periodo = (clone $fecha_inicio_obj)->add(new DateInterval("P{$periodo_meses}M"));

// Crear la serie de eventos recurrentes
$periodo = new DatePeriod($fecha_inicio_obj, $intervalo, $fecha_fin_periodo);

?>

<?php include 'includes/header.php'; ?>
<h2>Eventos Recurrentes</h2>
<p><b>Fecha de inicio:</b> <?= $fecha_inicio_obj->format('d/m/Y H:i:s') ?></p>
<p><b>Duración de cada evento:</b> <?= $duracion_usuario ?></p>
<p><b>Intervalo de repetición:</b> Cada <?= $intervalo->format('%d días') ?> días</p>
<p><b>Periodo de recurrencia:</b> <?= $periodo_meses ?> meses</p>

<h3>Lista de eventos programados:</h3>
<ul>
    <?php foreach ($periodo as $evento): ?>
        <?php $fecha_fin_evento = (clone $evento)->add($duracion_intervalo); ?>
        <li>
            <b>Inicio:</b> <?= $evento->format('d/m/Y H:i') ?> |
            <b>Fin:</b> <?= $fecha_fin_evento->format('d/m/Y H:i') ?> |
            <b>Duración:</b> <?= $duracion_intervalo->format('%H horas %I minutos') ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'includes/footer.php'; ?>
