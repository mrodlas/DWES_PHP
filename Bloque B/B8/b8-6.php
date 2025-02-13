<?php
// Datos del evento (ejemplo)
$fecha_evento_utc = new DateTime('2024-03-15 10:00:00', new DateTimeZone('UTC'));
$titulo_evento = "Conferencia Internacional";

// Zonas horarias a convertir
$zonas_horarias = [
    'America/New_York' => 'Nueva York',
    'Asia/Tokyo' => 'Tokio',
    'Europe/London' => 'Londres'
];

?>

<?php include 'includes/header.php'; ?>

<div class="contenedor">
    <h2><?= $titulo_evento ?></h2>
    <p><b>Fecha y hora UTC:</b> <?= $fecha_evento_utc->format('Y-m-d H:i:s') ?></p>

    <?php foreach ($zonas_horarias as $zona_horaria => $ciudad): ?>
        <?php 
        // Clonar la fecha y convertirla a la zona horaria local
        $fecha_evento_local = clone $fecha_evento_utc;
        $fecha_evento_local->setTimezone(new DateTimeZone($zona_horaria));

        // Obtener información de la zona horaria
        $timezone = new DateTimeZone($zona_horaria);
        $location = $timezone->getLocation();

        // Obtener transiciones de horario de verano (DST)
        $transitions = $timezone->getTransitions(
            $fecha_evento_local->getTimestamp(), 
            $fecha_evento_local->getTimestamp() + 86400
        );
        ?>

        <div class="zona">
            <h3>Fecha y hora en <?= $ciudad ?>:</h3>
            <p><b>Fecha local:</b> <?= $fecha_evento_local->format('Y-m-d H:i:s') ?></p>

            <h4>Información de la zona horaria:</h4>
            <ul>
                <li><b>Nombre:</b> <?= $timezone->getName() ?></li>
                <li><b>Longitud:</b> <?= $location['longitude'] ?></li>
                <li><b>Latitud:</b> <?= $location['latitude'] ?></li>
                <li><b>Offset respecto a UTC:</b> <?= ($timezone->getOffset($fecha_evento_local) / 3600) ?> horas</li>
            </ul>

            <?php if (!empty($transitions)): ?>
                <h4>Transiciones de horario de verano:</h4>
                <ul>
                    <?php foreach ($transitions as $transition): ?>
                        <li><b>Fecha de transición:</b> <?= date('Y-m-d H:i:s', $transition['ts']) ?></li>
                        <li><b>Offset:</b> <?= ($transition['offset'] / 3600) ?> horas</li>
                        <li><b>Horario de verano:</b> <?= $transition['isdst'] ? 'Sí' : 'No' ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
