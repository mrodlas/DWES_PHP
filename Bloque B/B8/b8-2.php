<?php
// Simulación de entrada del usuario en el formato d/m/Y H:i:s
$fecha_usuario = "16/10/2024 15:30:00";

// Convertir la fecha de entrada en un objeto DateTime
$fecha_obj = DateTime::createFromFormat("d/m/Y H:i:s", $fecha_usuario);

if ($fecha_obj) {
    // Mostrar la fecha en formato "Y-m-d H:i:s"
    $fecha_formateada = $fecha_obj->format("Y-m-d H:i:s");

    // Obtener el timestamp UNIX
    $timestamp = $fecha_obj->getTimestamp();

    // Mostrar la fecha en formato legible como "16 de octubre de 2024, 15:30"
    setlocale(LC_TIME, 'es_ES.UTF-8'); // Configurar idioma en español
    $meses = [
        "January" => "enero", "February" => "febrero", "March" => "marzo",
        "April" => "abril", "May" => "mayo", "June" => "junio",
        "July" => "julio", "August" => "agosto", "September" => "septiembre",
        "October" => "octubre", "November" => "noviembre", "December" => "diciembre"
    ];
    $mes_actual = $meses[$fecha_obj->format("F")]; 
    $fecha_legible = $fecha_obj->format("d") . " de " . $mes_actual . " de " . $fecha_obj->format("Y") . ", " . $fecha_obj->format("H:i");
} else {
    $fecha_formateada = "Fecha inválida.";
    $timestamp = "No disponible.";
    $fecha_legible = "Fecha incorrecta.";
}
?>

<?php include 'includes/header.php'; ?>
<h2>Gestión de Eventos</h2>
<p><b>Fecha ingresada por el usuario:</b> <?= $fecha_usuario ?></p>
<p><b>Fecha en formato Y-m-d H:i:s:</b> <?= $fecha_formateada ?></p>
<p><b>Timestamp UNIX:</b> <?= $timestamp ?></p>
<p><b>Fecha en formato legible:</b> <?= $fecha_legible ?></p>
<?php include 'includes/footer.php'; ?>
